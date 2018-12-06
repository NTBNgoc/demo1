<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Food;

class FoodController extends Controller
{
    public function index()
    {
        $foods = DB::table('foods')->get();
        return view('foods.index', compact('foods'));
    }

    public function getAdd()
    {
        $foods = DB::table('foods')->get();
        return view('foods.add', compact('foods'));
    }

    public function postAdd(Request $request)
    {
        $foods = DB::table('foods')->insert([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'information' => $request->input('information'),
            'description' => $request->input('description'),
            'size' => $request->input('size'),
        ]);  
        return back()->with('status','Create successful.');
    }

    public function getEdit($id)
    {
        $foods = DB::table('foods')->find($id);
        return view('foods.edit', compact('foods'));
    }

    public function postEdit(Request $request, $id)
    {
        $foods = DB::table('foods')
            ->where('id', '=', $id)
            ->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'information' => $request->input('information'),
                'description' => $request->input('description'),
                'size' => $request->input('size'), 
            ]);
        return redirect('/admin/foods/list')->with('status','Edit successful.');
    }

    public function delete($id)
    {
        $foods = DB::table('foods')->where('id', $id)->delete();
        return redirect('/admin/foods/list')->with('status','Delete successful.');
    }
}
