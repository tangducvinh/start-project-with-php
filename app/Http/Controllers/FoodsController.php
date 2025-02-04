<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class FoodsController extends Controller
{
    //
    public function index() {
        $foods = Food::all();

        // dd($foods);
        return view('foods.index', ['foods' => $foods]);
    }

    public function create() {
        return view('foods.create');
    }

    public function store(Request $request) {

        // echo $request->body;
        // $food = new Food();
        // $food->name = $request->input('name');
        // $food->description = $request->input('description');
        // $food->count = 1;

        $food = Food::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'count' => 1,
        ]);

        $food->save();
        return redirect('/foods');
    }

    public function edit($id) {
        $food = Food::find($id);

        return view('foods.edit', ['food' => $food]);
    }

    public function update(Request $request, $id) {
        Food::where('id', $id)
                    -> update([
                        'name' => $request->input('name'),
                        'description' => $request->input('description')
                    ]);
        
        return redirect('/foods');
    }

    public function delete($id) {
        Food::where("id", $id)->delete();

        return redirect('/foods');
    }

    public function show($id) {
        $food = Food::find($id);
        // $category = Category::find($food->category_id);
        $category = $food->category;
        $food->category = $category;
        // dd($category);

        return view('foods.detail', ['food' => $food]);
    }
}
