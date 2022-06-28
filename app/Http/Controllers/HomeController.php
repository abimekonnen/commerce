<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\User;
use App\Models\category;
use App\Models\productTyp;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $types = ProductTyp::all();
        $categories = Category::all();
        return view('welcome',[
            'products' => $products,
            'types' => $types,
            'categories' => $categories,
        ]);
    }
}
