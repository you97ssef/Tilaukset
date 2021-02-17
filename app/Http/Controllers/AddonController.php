<?php

namespace App\Http\Controllers;

use App\Addon;
use Illuminate\Http\Request;

class AddonController extends Controller
{
    public function index(){
        $addons = Addon::all();
        return view('admin.addons.index',[
            'addons' => $addons
        ]);
    }

    public function create(){
        return view('admin.addons.create');
    }

    public function insert(){
        $addon = new Addon();
        $addon->name = request('name');
        if(empty($addon->name)){
            //Error
            return redirect('/admin/addons')->with('mssg','Something went wrong!');
        } else {
            $addon->save();
            return redirect('/admin/addons')->with('mssg','Add On added succefully!');
        }
    }

    public function update($id){
        $addon = Addon::findOrFail($id);
        return view('admin.addons.update',['addon' => $addon]);
    }

    public function modify(){
        $addon = Addon::find(request('id'));
        $addon->name = request('name');
        if(empty($addon->name)){
            //Error
            return redirect('/admin/addons')->with('mssg','Something went wrong!');
        } else {
            $addon->save();
            return redirect('/admin/addons')->with('mssg','Add On updated succefully!');
        }
    }

    public function delete(){
        Addon::where('id',request('id'))->delete();// return 1 if true
        return redirect('/admin/addons')->with('mssg','Add On deleted succefully!');
    }
}