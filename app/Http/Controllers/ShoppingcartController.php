<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Kratmeister;
use App\Beerbrand;
use App\Book;
use Carbon\Carbon;


class ShoppingcartController extends Controller
{

    // show a listing of the items in the shopping cart to the user
    public function index()
    {

        return view('shoppingcart.index');
    }

    // updating and deleting session data for books and kratmeisters.
    // If user wants more of the  same books is. The count of the book in the session is increased
    // For each kratmeister a new entry is made in its session.
    public function update(Request $request)
    {

        $copyRequest = $request->all();
        error_log(print_r( $request->all(),true));
        unset($copyRequest['_token']);

        $bookDeleteId = [];
        $kratmeisterDeleteNameUser = [];


        foreach ($copyRequest as $key => $value) {
            //since no ids are used in the kratmeister sessions. The name_user is used as id. 
            //However is the name consists out of two or more words, for example  "henkdrik jan".
            //everything after the whitespace is not send. In the blade this is circumvented by replacing
            // the whitespace with dashes, therefore here the dashes need to be replace by whitespaces again.
            $splittedKey = explode("&", str_replace("-"," ",$key)); 
            error_log("key and value ". $key." ".$value);

            $id = $splittedKey[0];
            $inputName = $splittedKey[1];
            $productId = $splittedKey[2];


            if ($inputName == 'count') {
                if ($productId == "book") {

                    if ($request->session()->has('sessionBooksb')) { //adding a book to count
                        $sessionBooksArray = json_decode($request->session()->get('sessionBooksb'), true);
                        foreach ($sessionBooksArray as $key => &$book) { ///& symbol needed else you wont be able to update the array value

                            if ($book["book_id"] == $id) {

                                $book["book_count"] = $value;
                                session(['sessionBooksb' => json_encode($sessionBooksArray)]);
                            }
                        }
                    }
                }
            } elseif ($inputName == 'delete') { // deleting a book form its session
                if ($productId == "book") {
                    array_push($bookDeleteId, $id);
                    if ($request->session()->has('sessionBooksb')) {
                        $sessionBooksArray = json_decode($request->session()->get('sessionBooksb'), true);
                        foreach ($sessionBooksArray as $key => &$book) {
                         

                            if ($book["book_id"] == $id) {

                                unset($sessionBooksArray[$key]);
                                session(['sessionBooksb' => json_encode($sessionBooksArray)]);
                            }
                        }
                    }
                }
                if ($productId == "kratmeister") { //Deleting an kratmeister from its session
                    array_push($kratmeisterDeleteNameUser, $id);
                    if ($request->session()->has('sessionKratmeistertest')) {
                        $sessionKratmeisterArray = json_decode($request->session()->get('sessionKratmeistertest'), true);
                        foreach ($sessionKratmeisterArray as $key => &$kratmeister) {
                        

                            if ($kratmeister["name_user"] == $id) { // name user is not the most ideal identifier because it could be used multiple times albeit the chanche is low
                                unset($sessionKratmeisterArray[$key]);
                                session(['sessionKratmeistertest' => json_encode($sessionKratmeisterArray)]);
                            }
                        }
                    }
                }

                // }

            }
        }

        //redirect to the same page.
        return redirect()->route("shoppingcart");
    }

    //When a new book is added by a user this function is called. If the sessionBooksb variable
    // doenst exists yet. The sessionBooksb is created and the book is added. If it already exist
    // the sessionBooksb is checked if the book is already in it. If that is the case the count of the book in
    // in sessionBooksb in updated.
    public function createBookSession(Request $request)
    {


        $book = Book::find($request->book_id);

        $data = [
            'product_category' => 'book',
            'book_id' => $request->book_id,
            'book_count' => $request->book_count,
            'book_title' => Book::find($request->book_id)->title,
            'book_price' => Book::find($request->book_id)->price,

        ];

        // check if sessionBooksb already exists
        if ($request->session()->has('sessionBooksb')) {
            $sessionBooksArray = json_decode($request->session()->get('sessionBooksb'), true);

            $updatedArray = false;



            foreach ($sessionBooksArray as &$value) {
                if ($value["book_id"] == $request->book_id) {
                    $value["book_count"] = $value["book_count"] + $request->book_count;
                    $updatedArray = true;
                }
            }

            if ($updatedArray == false) {
                array_push($sessionBooksArray, $data);
            } 

            session(['sessionBooksb' => json_encode($sessionBooksArray)]);
        } else { // create sessionBooksb variable


            session(['sessionBooksb' => json_encode([$data])]);
        }

        return redirect()->route('indexBook');
    }

    // create of update kratmeister session
    public function createKratmeisterSession(Request $request)
    {

        $validatedData = $request->validate([
            'name_user' => 'required',
            'packageSize' => 'required',
            'beerbrand_id' => 'required',
            'kratmeister_id' => 'required',
            'user_uploaded_image' => 'required',
            'back_label_text' => 'required|string|max:900',



        ]);

        $path = $request->user_uploaded_image->store('public/images/user_images');
        $imagePathSplit = explode("/", $path);
        error_log("DAFASFASDFASFS");
        error_log($request->input("back_label_text"));
        $data = [
            'name_user' => $request->input("name_user"),
            'back_label_text' => $request->input("back_label_text"),
            'packageSize' => $request->input("packageSize"),
            'beerbrand_id' => $request->input("beerbrand_id"),
            'kratmeister_id' => $request->input("kratmeister_id"),
            'user_photo_path' => end($imagePathSplit),
            'kratmeister_sticker_title' => Kratmeister::find($request->input("kratmeister_id"))->title,
            'kratmeister_sticker_price' => Kratmeister::find($request->input("kratmeister_id"))[$request->input("packageSize")],
            'kratmeister_beer_price' => $request->input("beerbrand_id") == "no_beer" ? 0 : Beerbrand::find($request->input("beerbrand_id"))[$request->input("packageSize")],
            'kratmeister_beer_brand' => $request->input("beerbrand_id") == "no_beer" ? "geen bier" : Beerbrand::find($request->input("beerbrand_id"))["beerbrand"],

        ];

        //delete after testing

        // if ($data['back_label_text'] == null) {

        //     $defaultText = str_replace("Bennie Ruighaver", $data['name_user'], Kratmeister::find($data['kratmeister_id'])->back_label_text);
        //     $data['back_label_text'] = $defaultText;

        //     error_log($defaultText);
        // }


        // if kratmeister session exist add to session kratmeister array
        if ($request->session()->has('sessionKratmeistertest')) {
            $sessionKratmeisterArray = json_decode($request->session()->get('sessionKratmeistertest'), true);
            array_push($sessionKratmeisterArray, $data);
            session(['sessionKratmeistertest' => json_encode($sessionKratmeisterArray)]);

            // kratmister session does not exists create new session
        } else {

    
            session(['sessionKratmeistertest' => json_encode([$data])]);
        }


        return redirect()->route("indexKratmeister");
    }


}
