<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use Error;
use Illuminate\Support\Facades\Validator;


// All blurb and carousel_images code is committed out, 
//for now these are not necessary maybe something for later.
//Therefore the code is not deleted.

class BookController extends Controller
{

    // user book index
    public function index()
    {
        return view('books.index', ['books' => Book::orderBy('created_at', 'DESC')->get()]);
    }

    //Delete afte testing
    // public function adminIndex()
    // {
    //     return view('admin.books.index', ['books' => Book::orderBy('created_at', 'DESC')->get()]);
    // }

    // show the form for creating a new book
    public function create()
    {
     
        return view('books.create');
    }

  
    //store the newly created book in storage
    // images are stored in storage\app\public\images\books
    // rest in store in the db
    // all blurb and carousel_images code isnt used now but leave for future
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'passage' => 'required',
            // 'blurb' => 'required',
            'main_image' => 'required',
            // 'carousel_images' => 'required',

        ]);
        // for now no carousel images are used but leave code for the future
        // $carouselImagesPaths = array();
        // $carouselImages = $request->carousel_images;
        // foreach ($carouselImages as $carouselImage) {
        //     $path = $carouselImage->store('public/images/books');
        //     $imagePathSplit= explode("/",$path);
        //     error_log("car image is ".end($imagePathSplit));
        //     array_push($carouselImagesPaths,end($imagePathSplit));
        // }

        $path = $request->main_image->store('public/images/books');
        $imagePathSplit= explode("/",$path);

        $Book = new Book;
        $Book->title = $request->input('title');
        $Book->price = $request->input('price');
        $Book->main_image = end($imagePathSplit);
        $Book->description = $request->input('description');
        $Book->passage = $request->input('passage');
        // $Book->carousel_images = json_encode($carouselImagesPaths);
        // $Book->blurb = $request->input('blurb');
        $Book->save();
        return redirect ('adminBooks');

    }

    //Dislay a book
    public function show($id)
    {

        return view('books.show', ['book' => Book::find($id)]);

    }

    // show the form to edit book data
    public function edit($id)
    {
        return view('books.edit', ['book' => Book::find($id)]);


    }

 
    //update book data
    // all blurb and carousel_images code isnt used now but leave for future

    public function update(Request $request, $id)
    
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'passage' => 'required',
            // 'blurb' => 'required',
            'main_image' => 'required',
            // 'carousel_images' => 'required',
        ]);

        if ($validator->fails()) {
            return view('books.edit', ['book' => Book::find($id)])
                        ->withErrors($validator);
        }

        $existingBook = Book::find($id);

        // $carouselImagesPaths = array();
        // $carouselImages = $request->carousel_images;
        // foreach ($carouselImages as $carouselImage) {
        //     $path = $carouselImage->store('public/images/books');
        //     $imagePathSplit= explode("/",$path);
        //     error_log("car image is ".end($imagePathSplit));
        //     array_push($carouselImagesPaths,end($imagePathSplit));
        // }

        $path = $request->main_image->store('public/images/books');
        $imagePathSplit= explode("/",$path);

        // $Book = new Book;
        $existingBook->title = $request->input('title');
        $existingBook->price = $request->input('price');
        $existingBook->main_image = end($imagePathSplit);
        $existingBook->description = $request->input('description');
        $existingBook->passage = $request->input('passage');
        // $existingBook->carousel_images = json_encode($carouselImagesPaths);
        // $existingBook->blurb = $request->input('blurb');
        $existingBook->save();
        return redirect ('adminBooks');

    }

    //remove book from database
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return redirect ('adminBooks');
        } else {
            return "Dit boek was niet vinden in de db neem even contact op en zeg even dat het om (BookController destroy) gaat";
        }
    }
}
