<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){
        $categories = Category::tree()->get()->toTree();
        return view('test',compact('categories'));
    }
}
