<?php

namespace App\Http\Controllers;
use App\Http\Services\Cart\CartService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    }

    public function index(Request $request){
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/carts');
    }
    public function show(){
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }
    public function update(Request $request){
        $this->cartService->update($request);

        return redirect('/carts');
        
    }
    public function remove($id = 0){
        $this->cartService->remove($id);

        return redirect('/carts');
    }
}
