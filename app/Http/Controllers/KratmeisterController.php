<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Kratmeister;
use App\Beerbrand;
use Illuminate\Support\Facades\Storage;


class KratmeisterController extends Controller
{

    // display listing of kratmeister for user
    public function index()
    {
        return view('kratmeister.index', ['kratmeisters' => Kratmeister::orderBy('created_at', 'DESC')->get()]);

    }



    //show the form for creating a kratmeister resource
    public function create()
    {
        return view('kratmeister.create');

    }

   //store a newly created kratmeister resource
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'back_label_text' => 'required|string|max:900',
            'front_label_image' => 'required',
            'carousel_images' => 'required',
            'single_can_price' => 'required',
            'single_small_bottle_price' => 'required',
            'single_large_bottle_price' => 'required',
            'sixpack_can_price' => 'required',
            'sixpack_bottle_price' => 'required',
            'beercase_price' => 'required',
        ]);


        $carouselImagesPaths = array();
        $carouselImages = $request->carousel_images;
        foreach ($carouselImages as $carouselImage) {
            $replaceFilename = str_replace("_"," ",$carouselImage->getClientOriginalName());
            $explodeFilename = explode(".",$replaceFilename);
            $cleanFilename =  reset($explodeFilename);
            $path = $carouselImage->store('public/images/kratmeisters');
            $imagePathSplit= explode("/",$path);
            array_push($carouselImagesPaths,array(end($imagePathSplit),$cleanFilename));
        }

        $path = $request->front_label_image->store('public/images/kratmeisters');
        $imagePathSplit= explode("/",$path);

        $Kratmeister = new Kratmeister();
        $Kratmeister->title = $request->input('title');
        $Kratmeister->front_label_image = end($imagePathSplit);
        $Kratmeister->back_label_text = $request->input('back_label_text');
        $Kratmeister->carousel_images = json_encode($carouselImagesPaths);
        $Kratmeister->single_can_price = $request->input('single_can_price');
        $Kratmeister->single_small_bottle_price = $request->input('single_small_bottle_price');
        $Kratmeister->single_large_bottle_price = $request->input('single_large_bottle_price');
        $Kratmeister->sixpack_can_price = $request->input('sixpack_can_price');
        $Kratmeister->sixpack_bottle_price = $request->input('sixpack_bottle_price');
        $Kratmeister->beercase_price = $request->input('beercase_price');
        $Kratmeister->save();
        return redirect ('adminKratmeister');
    }

    //Display a specified kratmeister
    public function show($id)
    {
        return view('kratmeister.show', ['kratmeister' => Kratmeister::find($id),'beerbrands' => Beerbrand::orderBy('created_at', 'DESC')->get()]);

    }

    //show the form for editing a specified kratmeister
    public function edit($id)
    {
        return view('kratmeister.edit', ['kratmeister' => Kratmeister::find($id)]);

    }

    //Update the specified kratmeister in storage

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'back_label_text' => 'required|string|max:900',
            'front_label_image' => 'required',
            'carousel_images' => 'required',
            'single_can_price' => 'required',
            'single_small_bottle_price' => 'required',
            'single_large_bottle_price' => 'required',
            'sixpack_can_price' => 'required',
            'sixpack_bottle_price' => 'required',
            'beercase_price' => 'required',
        ]);

        if ($validator->fails()) {
            return view('kratmeister.edit', ['kratmeister' => Kratmeister::find($id)])
                        ->withErrors($validator);
        }

        $existingKratmeister = Kratmeister::find($id);

        //delete existing front label image

        Storage::delete('public/images/kratmeisters/'.$existingKratmeister->front_label_image);



        /// delete existing kratmeister carousel images
        if (count(json_decode($existingKratmeister->carousel_images, true)[0])>0)
{


        foreach (json_decode($existingKratmeister->carousel_images) as $carousel_image) {
            Storage::delete('public/images/kratmeisters/'.$carousel_image[0]);
        }
    }

        /////

        $carouselImagesPaths = array();
        $carouselImages = $request->carousel_images;

        foreach ($carouselImages as $carouselImage) {

            $replaceFilename = str_replace("_"," ",$carouselImage->getClientOriginalName());
            $explodeFilename = explode(".",$replaceFilename);
            $cleanFilename =  reset($explodeFilename);

            $path = $carouselImage->store('public/images/kratmeisters');
            $imagePathSplit= explode("/",$path);
            array_push($carouselImagesPaths,array(end($imagePathSplit),$cleanFilename));
        }

        $path = $request->front_label_image->store('public/images/kratmeisters');
        $imagePathSplit= explode("/",$path);

        $existingKratmeister->title = $request->input('title');
        $existingKratmeister->front_label_image = end($imagePathSplit);
        $existingKratmeister->back_label_text = $request->input('back_label_text');
        $existingKratmeister->carousel_images = json_encode($carouselImagesPaths);
        $existingKratmeister->single_can_price = $request->input('single_can_price');
        $existingKratmeister->single_small_bottle_price = $request->input('single_small_bottle_price');
        $existingKratmeister->single_large_bottle_price = $request->input('single_large_bottle_price');
        $existingKratmeister->sixpack_can_price = $request->input('sixpack_can_price');
        $existingKratmeister->sixpack_bottle_price = $request->input('sixpack_bottle_price');
        $existingKratmeister->beercase_price = $request->input('beercase_price');

        $existingKratmeister->save();
        return redirect ('adminKratmeister');
    }

    //Remove the specified kratmeister from storage.

    public function destroy($id)
    {
        $kratmeister = Kratmeister::find($id);
        if ($kratmeister) {

            /// delete existing kratmeister carousel images

            Storage::delete('public/images/kratmeisters/'.$kratmeister->front_label_image);


            foreach (json_decode($kratmeister->carousel_images) as $carousel_image) {
                Storage::delete('public/images/kratmeisters/'.$carousel_image[0]);
            }
            $kratmeister->delete();
            return redirect ('adminKratmeister');
        } else {
            return "Dit boek was niet vinden in de db neem even contact op en zeg even dat het om (BookController destroy) gaat";
        }
    }
}
