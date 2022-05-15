<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
class DetailController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService){
        
        $this->productService = $productService;
        
    }
    public function index($id ='', $slug =''){
        $product = $this->productService->showDetail($id);
        return view('product.content',[
            'title' => $product->name,
            'product' => $product
        ]);
    }
}
