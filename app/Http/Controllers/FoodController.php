<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Food;
use Auth;

class FoodController extends Controller
{
    // public function index()
    // {
    //     return Food::all();
    // }
 
    // public function show($id)
    // {
    //     return Food::find($id);
    // }

    // public function store(Request $request)
    // {
    //     return Food::create($request->all())->with('status', 'Create successful.');
    // }

    // public function update(Request $request, $id)
    // {
    //     $foods = Food::findOrFail($id);
    //     $foods->update($request->all());

    //     return $foods->with('status', 'Edit successful.');
    // }

    // public function delete(Request $request, $id)
    // {
    //     $foods = Food::findOrFail($id);
    //     $foods->delete();

    //     return 204->with('status', 'Delete successful.');
    // }
    public function index()
    {
        $foods = Food::all();
        return view('foods.index', compact('foods'));
        // return Food::all();
    }

    public function getAdd()
    {
        $foods = DB::table('foods')->get();
        return view('foods.add', compact('foods'));
    }

    public function postAdd(Request $request)
    {
        // // return 1;
        // // $user = Auth::check();
        // // dd(Auth::user()->id);
        // $foods = DB::table('foods')->insert([
        //     'name' => $request->input('name'),
        //     'price' => $request->input('price'),
        //     'information' => $request->input('information'),
        //     'description' => $request->input('description'),
        //     'size' => $request->input('size'),
        //     'user_id' => Auth::user()->id,
        // ]);

        // return response()->json($foods);
        // return back()->with('status', 'Create successful.');
        $test = Food::create($request->all());
        return response()->json($test);
        
        // return redirect()->route('list');
    }

    public function getEdit($id)
    {
        $foods = DB::table('foods')->find($id);
        return view('foods.edit', compact('foods'));
    }

    public function postEdit(Request $request, $id)
    {
        $user = Auth::check();
        $foods = DB::table('foods')
            ->where('id', '=', $id)
            ->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'information' => $request->input('information'),
                'description' => $request->input('description'),
                'size' => $request->input('size'),
                'user_id' => $user,
            ]);
        // return redirect('/admin/foods/list')->with('status', 'Edit successful.');
        // 
        $foods = Food::findOrFail($id);
        $foods->update($request->all())->with('status', 'Edit successful.');

        return $foods;
    }

    public function delete(Request $request, $id)
    {
        $foods = DB::table('foods')->where('id', $id)->delete();
        return redirect('/admin/foods/list')->with('status', 'Delete successful.');
    }
}
