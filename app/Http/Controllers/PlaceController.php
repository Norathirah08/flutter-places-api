<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    //CREATE
    public function store(Request $request){
        $place = new Place();
        $place->name = $request->name;
        $place->address = $request->address;
        $place->description = $request->description;
        $place->image_url = $request->image_url;
        $place->phone_number = $request->phone_number;
        $place->email = $request->email;
        
        if($place->save()){
            return response()->json([
                "success"=>true,
                "message"=>"Place successfully added"
            ]);
        }else {
            return response()->json([
                "success"=>false,
                "message"=>"Something is wrong"
            ]);
        }
    }

    //READ ALL
    public function index(){
        // $places = Place::all();
        $places = Place::select('id','name','address','image_url')->get();
        if($places){
            return response()->json([
                "success"=>true,
                "data"=>$places
            ]);

        }else {
            return response()->json([
                "success"=>false,
                "message"=>"Something is wrong"
            ]);
        }

    }

    //READ BY ID
    public function show($id){
        $place = Place::find($id);

        if($place){
            return response()->json([
                "success"=>true,
                "data"=>$place
            ]);
        }else {
            return response()->json([
                "success"=>false,
                "message"=>"Something is wrong"
            ]);
        }
    }

    //UPDATE
    public function update(Request $request, $id){
        $place=Place::find($id);
        if($place){
            $place->name = $request->name;
            $place->address = $request->address;
            $place->description = $request->description;
            $place->image_url = $request->image_url;
            $place->phone_number = $request->phone_number;
            $place->email = $request->email;

            if($place->save()){
                return response()->json([
                    "success"=>true,
                    "message"=>"Place successfully updated",
                    "data"=>$place
                ]);
            
            }else {
                return response()->json([
                    "success"=>false,
                    "message"=>"Something is wrong"
                ]);
            }
        }
    }

    //DELETE
    public function delete($id){
        $place=Place::find($id);
        if($place){
            if($place->delete()){
                return response()->json([
                    "success"=>true,
                    "message"=>"Place successfully deleted",
                ]);
            }else {
                return response()->json([
                    "success"=>false,
                    "message"=>"Something is wrong"
                ]);
            }
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"ID not found"
            ]);
        }
    }
}
