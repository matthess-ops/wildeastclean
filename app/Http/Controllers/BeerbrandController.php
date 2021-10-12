<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Beerbrand;

class BeerbrandController extends Controller
{


     //the beerbrand index is shown by adminController, route('adminBeerbrands')
    public function index()
    {
        //
    }


    //creates a new beerbrand entry in the database
    public function create()
    {
        $beerbrandResults = Beerbrand::where('beerbrand', "nieuw_merk")->first();
        if(empty($beerbrandResults)){
            $newEntry = new Beerbrand();
            $newEntry->beerbrand = "nieuw_merk";
            $newEntry->save();
        }
        
        return redirect ()->route('adminBeerbrands');
    }

    //delte after testing
    // public function add(Request $request){

    //     $beerbrandResults = Beerbrand::where('beerbrand', "nieuw merk")->first();
    //     if(count($beerbrandResults) >0){

    //     }else{
    //         $newEntry = new Beerbrand();
    //         $newEntry->beerbrand = "nieuw merkt";
    //         $newEntry->save();
    //     }

    //     return redirect ()->route('adminBeerbrands');


    // }


    //stores all the user updated beerbrand values
    public function store(Request $request)
    {

        $copyRequest = $request->all();
        unset($copyRequest['_token']); //remove _token because it isnt user input
        $valueErrorsFound = []; //check if all the inputs have an value. This should be empty.
        $deleteIds = []; // these are the delete check boxed
        $nonDeleteFields = []; // these are all the different package size monetary values
        foreach ($copyRequest as $key => $value) {
            $splittedKey = explode("&", $key);
            $id = $splittedKey[0];
            $inputName = $splittedKey[1];
            if ($inputName!='delete') {
                if($value == null){
                    array_push($valueErrorsFound,$key);
                }else{
                    $nonDeleteFields[$key] = $value;
                }
            }else{
                array_push($deleteIds,$id);
            }


        }

        $nonDeleteInputValueError = [];
        //check if the the non delete field inputs have a negative value. This should only be 0 +
        foreach ($nonDeleteFields as $key => $value) {
           if($value < 0){
            array_push($nonDeleteInputValueError ,$key);

           }
        }

        //check and return nonDeleteInputValueError
        if (count($nonDeleteInputValueError)>0) {
            return redirect()->back()->withErrors($nonDeleteInputValueError);
        }

    
        //check and return valueErrorsFound

        elseif(count($valueErrorsFound) > 0){
            return redirect()->back()->withErrors($valueErrorsFound);

        }else{


            foreach ($nonDeleteFields as $key => $value) {
                $splittedKey = explode("&", $key);
                $id = $splittedKey[0];
                $inputName = $splittedKey[1];
                $valueToUpdate = Beerbrand::find($id); // find and change the associated beerbrand packagesize to the new value
                $valueToUpdate->$inputName = $value;
                $valueToUpdate->save();
            }

            //delete the beerbrand from db
            foreach($deleteIds as $id){
                $row = Beerbrand::find($id);
                $row->delete();
            }

            return redirect ()->route('adminBeerbrands');

        }

    
    }

    //delete after testing
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     error_log("destory beerbrand");
    // }
}
