<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Place;
use Tymon\JWTAuth\Facades\JWTAuth;

class ReviewController extends Controller
{
    //CREATE
    public function store(Request $request,$placeId){
        try {
            $place = Place::find($placeId);
            $place["avg_rating"] = ($place["avg_rating"] * count($place["reviews"]) + $request->rating) /
            (count($place["reviews"])+1);

            $user = JWTAuth::parseToken()->authenticate();
            $userId = $user->id;

            //This should be done inside a DB transaction
            //start transaction here
            Review::create([
                "rating"=>$request->rating,
                "user_id"=>$userId,
                "place_id"=>$placeId,
                "comments"=>$request->comments
            ]);

            $place->save();
            //commit transaction here

            return response()->json(["success"=>true,
            'message'=>"Review successfully added"]);


        } catch (\Exception $e) {
            return response()->json(['error' => 'Add review failed.'.$e], 500);
            //rollback transaction here
        }

    }

    //READ ALL
    public function index(){

    }

    //READ BY ID
    public function show($id){

    }

    //UPDATE
    public function update(Request $request, $id){

    }

    //DELETE
    public function delete($id){

    }
}
