<?php

namespace App\Http\Controllers;

use App\Models\food;
use Illuminate\Http\Request;

class foodController extends Controller
{
    public function getFoods(){
    $foods = food::all();
    return response()->json($foods);
    
    }

    public function newFood(Request $request){
    $food = food::create($request->all());
    return response()->json($food);
    }

    public function getFood($id){
    $food = food::find($id);
    if (!$food){
    return response()->json(['message' => 'Food not found'], 404);
    }    
    else
    {
        return response()->json($food);
    }
    }

    public function updateFood(Request $request, $id){
    $food = food::find($id);
    if (!$food){
    return response()->json(['message' => 'Food not found'], 404);
    }
    else
    {
        $food->update($request->all());
        return response()->json($food);
    }
    }

    public function deleteFood($id){
    $food = food::find($id);
    if (!$food){
    return response()->json(['message' => 'Food not found'], 404);
    }
    else
    {
        $food->delete();
        return response()->json(['message' => 'Food deleted']);
    }

    }
}