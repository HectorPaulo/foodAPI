<?php

namespace App\Http\Controllers;

use App\Models\food;
use Illuminate\Http\Request;

class foodController extends Controller
{
    public function getFoods(){
        $foods = food::all();
        return response()->json($foods, 200);
    }

    public function newFood(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'categoria' => 'required|string|max:255',
            'url_img' => 'required|url'
        ]);

        $food = food::create($validatedData);
        return response()->json($food, 201); 
    }

    public function getFood($id){
        $food = food::find($id);
        if(!$food){
            return response()->json(['message' => 'food not found'], 404);
        }
        return response()->json($food);
    }

    public function deleteFood($id){
        $food = food::find($id);
        if(!$food){
            return response()->json(['message' => 'food not found'], 404);
        }
        $food->delete();
        return response()->json(['message' => 'food deleted'], 200);
    }

    public function updateFood($id, Request $request){
        $food = food::find($id);
        if(!$food){
            return response()->json(['message' => 'food not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'precio' => 'sometimes|required|numeric',
            'categoria' => 'sometimes|required|string|max:255',
            'url_img' => 'sometimes|required|url'
        ]);

        $food->update($validatedData);
        return response()->json($food);
    }
}
