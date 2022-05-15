<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class MainController extends Controller
{
    protected $product;
    public function __construct(ProductService $product){
        $this->product = $product;
    }
    public  function index(){
        return view('home',[
            'title' => 'Shop Flower',
            'products' =>  $this->product->get()
        ]);
    }
    public function loadProduct(Request $request){
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if(count($result) !== 0){
            $html = view('product.list', ['products'=> $result])->render();

            return response()->json(['html' => $html]);
        }
        return response()->json(['html' => '']);
    }

}
