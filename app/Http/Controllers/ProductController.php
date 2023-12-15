<?php

namespace App\Http\Controllers;

use App\Models\Produc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Assurez-vous d'importer la classe Controller
use App\Models\Order;

class ProductController extends Controller
{
    public function index()

    {

        if(request()->categorie){
$products=Produc::with('categories')->whereHas('categories', function($q){
    $q->where('slug', request()->categorie) ;
})->orderBy('created_at','DESC')->paginate(6);
        }else{
                    $products=Produc::with('categories')->orderBy('created_at','DESC')->paginate(6);

        }
        return view('products.index')->with('products',$products);
    }


    public function show($slug){
        $product=Produc::where('slug',$slug)->first();
        return view('products.show')->with('product',$product);
    }


    public function search(){
        request()->validate([
            'q' => 'required|min:3',
        ]);
        


$q=request()->input('q');
$products=Produc::where('title','like',"%$q%")->orWhere('description','like',"%$q%")->paginate(6);
       return view("products.search")->with("products",$products);
    }

}
