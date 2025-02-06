<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        $names = ['Vinh', 'Berlin', 'Tokyo', 'Paris'];
        return view('about', ["names" => $names]);
    }

    public function blog() {
        return view('blog');
    }

    public function welcome() {
        return view('welcome');
    }
}
