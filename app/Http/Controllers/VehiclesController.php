<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Http;

class VehiclesController extends Controller
{
    public function index($id = null){
        return $id?Vehicle::find($id):Vehicle::all();
    }

    public function addVehicle(Request $req){
        $vehicle = new Vehicle;
        $vehicle-> make = $req->make;
        $vehicle-> model = $req -> model;
        $vehicle -> year = $req -> year;
        $vehicle -> description = $req -> description;
        $vehicle -> image = $req->image;

        // $file= $req->file('image');
        // $filename= date('YmdHi').$file->getClientOriginalName();
        // $file-> move(public_path('public\images'), $filename);

        // $vehicle -> image = public_path("public\images/").$filename;

        $result = $vehicle->save();
        if($result){ 
            $response = Http::get('http://127.0.0.1:8000/sendAddMail');
            return ["Result"=>"Vehicle has been saved"];

        }else{
            return ["Result"=>"Failed to save Vehicle"];
        }
    }

    public function updateVehicle($id, Request $req){
        $vehicle = Vehicle::find($id);
        if($req->make != null){
            $vehicle-> make = $req->make;
        }

        if($req->model != null){
            $vehicle-> model = $req -> model;
        }

        if($req->year != null){
            $vehicle -> year = $req -> year;
        }
        
        if($req->description != null){
            $vehicle -> description = $req -> description;
        }

        if($req->image != null){
            $vehicle -> image = $req -> image;
        }

        $result = $vehicle->save();

        if($result){
            return ["Result"=>"Vehicle has been updated"];
        }else{
            return ["Result"=>"Failed to update"];
        }
    }

    public function searchVehicle($make){
        return Vehicle::where("make", "like", "%".$make."%")->get();
    }

    public function deleteVehicle($id){

        $vehicle =  Vehicle::find($id);
        $result = $vehicle -> delete();

        if($result){
            $response = Http::get('http://127.0.0.1:8000/sendDeleteMail');
            return["result" => "Vehicle deleted"];
        }else{
            return["result" => "Failed to delete Vehicle"];
        }
    }

}
