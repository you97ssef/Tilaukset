<?php

namespace App\Http\Controllers;

use App\Food;
use App\Categorie;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        $foods = Food::all();
        return view('admin.foods.index',[
            'foods' => $foods,
            'categories' => $categories
        ]);
    }

    public function create(){
        $categories = Categorie::all();
        return view('admin.foods.create',[
            'categories' => $categories
        ]);
    }

    public function insert(){
        $food = new Food();
        $food->name = request('name');
        $food->description = request('description');
        $food->price = request('price');
        $food->categorieId = request('categorie');
        if(empty($food->name) || !is_numeric($food->price) || !is_numeric($food->categorieId)){
            //Error
            return redirect('/admin/foods')->with('mssg','Something went wrong!');
        } else {
            $food->save();
            return redirect('/admin/foods')->with('mssg','Food added succefully!');
        }
    }

    public function update($id){
        $food = Food::findOrFail($id);
        $categories = Categorie::all();
        return view('admin.foods.update',[
            'food' => $food,
            'categories' => $categories
        ]);
    }

    public function modify(){
        $food = Food::find(request('id'));
        $food->name = request('name');
        $food->description = request('description');
        $food->price = request('price');
        $food->categorieId = request('categorie');
        error_log($food);
        if(empty($food->name) || !is_numeric($food->price) || !is_numeric($food->categorieId) ) {
            //Error
            return redirect('/admin/foods')->with('mssg','Something went wrong!');
        } else {
            $food->save();
            return redirect('/admin/foods')->with('mssg','Food updated succefully!');
        }
    }

    public function delete(){
        Food::where('id',request('id'))->delete();// return 1 if true
        return redirect('/admin/foods')->with('mssg','Food deleted succefully!');
    }
}
