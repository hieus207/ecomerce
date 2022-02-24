<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Post;
use App\Models\Product;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome(Request $request){
        // 3-5 BAI VIET SLIDER
        $posts = Post::where('isshow','1')->orderBy('id','DESC')->get();
        // SAN PHAM BAN CHAY
        $bestseller = Product::orderBy('quantity_sold','DESC') ->take(10) ->get();
        // GOI Y HOM NAY
        $suggestproduct = Product::all()->random(5);

        // TRUYEN CATALOG
        $catalogs = Catalog::all();

        if (!$request->session()->has('guest_id')) {
            $request->session()->put('guest_id',uniqid());
        }

        return view('welcome',compact('posts','bestseller','suggestproduct','catalogs'));
    }

}
