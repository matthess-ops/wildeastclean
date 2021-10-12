<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Overigeproduct;
use Illuminate\Support\Facades\Validator;

// not used for now however the data and code will be similar of that of a book.
class OverigeproductController extends Controller
{
    public function index()
    {
        return view('overigeProducts.index', ['overigeProducts' => Overigeproduct::orderBy('created_at', 'DESC')->get()]);

    }

    public function create()
    {
        return view('overigeProducts.create');

    }


    public function store(Request $request)
    {

     
        error_log("overige pdorudcten store");
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'main_image' => 'required',
            'carousel_images' => 'required',
         

        ]);

        error_log(json_encode($request->title));

        $carouselImagesPaths = array();
        $carouselImages = $request->carousel_images;
        foreach ($carouselImages as $carouselImage) {
            $path = $carouselImage->store('public/images/overigeProducts');
            $imagePathSplit= explode("/",$path);
            array_push($carouselImagesPaths,end($imagePathSplit));
        }

        $path = $request->main_image->store('public/images/overigeProducts');
        $imagePathSplit= explode("/",$path);

        $Overigeproduct = new Overigeproduct();
        $Overigeproduct->title = $request->input('title');
        $Overigeproduct->main_image = end($imagePathSplit);
        $Overigeproduct->description = $request->input('description');
        $Overigeproduct->carousel_images = json_encode($carouselImagesPaths);
        $Overigeproduct->save();
        return redirect()->route('adminOverigeProducten');
    }


    public function show($id)
    {
        return view('overigeProducts.show', ['overigeProduct' => OverigeProduct::find($id)]);

    }


    public function edit($id)
    {
        return view('overigeProducts.edit', ['overigeProduct' => OverigeProduct::find($id)]);

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'main_image' => 'required',
            'carousel_images' => 'required',
        ]);

        if ($validator->fails()) {
            return view('overigeProducts.edit', ['overigeProduct' => Overigeproduct::find($id)])
                        ->withErrors($validator);
        }

        $existingOverigeProduct = Overigeproduct::find($id);

        $carouselImagesPaths = array();
        $carouselImages = $request->carousel_images;
        foreach ($carouselImages as $carouselImage) {
            $path = $carouselImage->store('public/images/overigeProducts');
            $imagePathSplit= explode("/",$path);
            array_push($carouselImagesPaths,end($imagePathSplit));
        }

        $path = $request->main_image->store('public/images/overigeProducts');
        $imagePathSplit= explode("/",$path);

        // $Book = new Book;
        $existingOverigeProduct->title = $request->input('title');
        $existingOverigeProduct->main_image = end($imagePathSplit);
        $existingOverigeProduct->description = $request->input('description');
        $existingOverigeProduct->carousel_images = json_encode($carouselImagesPaths);
        $existingOverigeProduct->save();
        return redirect()->route('adminOverigeProducten');
    }


    public function destroy($id)
    {
        $overigeProduct = Overigeproduct::find($id);
        if ($overigeProduct) {
            $overigeProduct->delete();
            return redirect ()->route('adminOverigeProducten');
        } else {
            return "Dit boek was niet vinden in de db neem even contact op en zeg even dat het om (BookController destroy) gaat";
        }
    }
}
