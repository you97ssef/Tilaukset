<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('admin.categories.index',[
            'categories' => $categories
        ]);
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function insert(){
        $category = new Categorie();
        $category->name = request('name');
        if(empty($category->name)){
            //Error
            return redirect('/admin/categories')->with('mssg','Something went wrong!');
        } else {
            $category->save();
            return redirect('/admin/categories')->with('mssg','Category added succefully!');
        }
    }

    public function update($id){
        $category = Categorie::findOrFail($id);
        return view('admin.categories.update',['category' => $category]);
    }

    public function modify(){
        $category = Categorie::find(request('id'));
        $category->name = request('name');
        if(empty($category->name)){
            //Error
            return redirect('/admin/categories')->with('mssg','Something went wrong!');
        } else {
            $category->save();
            return redirect('/admin/categories')->with('mssg','Category updated succefully!');
        }
    }

    public function delete(){
        Categorie::where('id',request('id'))->delete();// return 1 if true
        return redirect('/admin/categories')->with('mssg','Category deleted succefully!');
    }

}
