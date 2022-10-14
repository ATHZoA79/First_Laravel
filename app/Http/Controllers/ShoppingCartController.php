<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function step01() {
        // Currently login user id
        $user = Auth::id();
        $shopping = ShoppingCart::where('user_id', '=', $user)->get();
        // $shopping = ShoppingCart::where('user_id', $user); Short ver. 
        dd($shopping, $shopping[0]->product->product_name); // Check data 
        return view('shopping.checkout1', compact('shopping'));
    }
    public function step02() {
        return view('shopping.checkout2');
    }
    public function step03() {
        return view('shopping.checkout3');
    }
    public function step04() {
        return view('shopping.checkout4');
    }
}
