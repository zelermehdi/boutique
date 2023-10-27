<?php

namespace App\Http\Controllers;

use App\Models\Produc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Assurez-vous d'importer la classe Controller

class ProductController extends Controller
{
    public function index()
    {
        $products=Produc::inRandomOrder()->limit(10)->get();
        return view('products.index')->with('products',$products);
    }


    public function show($slug){
        $product=Produc::where('slug',$slug)->first();
        return view('products.show')->with('product',$product);
    }
}
