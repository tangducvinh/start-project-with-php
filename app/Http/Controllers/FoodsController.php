<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

class FoodsController extends Controller
{
    //
    public function index() {
        $foods = Food::all();
        $categories = Category::all();

        // dd($foods);
        return view('foods.index', ['foods' => $foods, 'categories' => $categories]);
    }

    public function create() {
        $categories = Category::all();
        return view('foods.create', ['categories' => $categories]);
    }

    public function store(Request $request) {
        
        $request->validate([
            'name' => 'required',
            'count' => 'required|integer',
            'category' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);
        // echo $request->body;
        // $food = new Food();
        // $food->name = $request->input('name');
        // $food->description = $request->input('description');
        // $food->count = 1;

        // dd($request->hasFile('image'));
        // dd($request->file('image')->isValid()); // png, jpg

        $generatedImageName = 'image'.time().'-'.$request->name.".".$request->image->extension();

        // dd($generatedImageName);

        $request->image->move(public_path('images'), $generatedImageName);

        

        $food = Food::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'count' => $request->input("count"),
            'category_id' => $request->input('category'),
            'image_path' => $generatedImageName,
        ]);

        $food->save();
        return redirect('/foods');
    }

    public function edit($id) {
        $food = Food::find($id);

        return view('foods.edit', ['food' => $food]);
    }

    public function update(CreateValidationRequest $request, $id) {
        
        // $request->validate([
        //     'name' => ['required', new Uppercase],
        //     'count' => 'required|integer',
        //     'category' => 'required'
        // ]);
        $request->validated();
        
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
        $category = Category::find($food->category_id);
        // $category = $food->category;
        $food->category = $category;
        // dd($category);

        return view('foods.detail', ['food' => $food]);
    }
}
