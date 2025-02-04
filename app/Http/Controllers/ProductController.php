<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $data = "Data pass to view";
        return view('products.index', compact('data'));
    }

    public function detail($id, $productName) {
        return "product's id: ". $id. " productName: ".$productName;
    }
}
