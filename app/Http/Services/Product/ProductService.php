<?php


namespace App\Http\Services\Product;


use App\Models\Product;
use Illuminate\Support\Facades\Session;
const LIMIT = 16;
class ProductService{
    public function get($page = null){
        return Product::select('id', 'name', 'price_old', 'price', 'thumb')
        ->orderByDesc('id')
        ->when($page !== null, function($query) use ($page){
            $query->offset($page * LIMIT);
        })
        ->limit(LIMIT)
        ->get();
    }
    public function show($id){
        return Product::select('id','name', 'price_old', 'price', 'thumb', 'description')->where('id', $id)->get();
    }
    public function showDetail($id){
        return Product::where('id', $id)->with('menu')->firstOrFail();
    }
}