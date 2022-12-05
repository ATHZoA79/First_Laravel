<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;
use App\Models\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index() {
        $products = Product::orderBy('id','desc')->get(); 

        return view('index', compact('products')); 
    }

    public function add_cart(Request $request) {
        $product = Product::find($request->product_id);
        if ($request->add_qty > $product->product_qty) {
            $result = [
                'result' => 'error',
                'message' => 'No Enough Inventory',
            ];
            return json_encode($result);
        }elseif ($request->add_qty < 1) {
            $result = [
                'result' => 'error',
                'message' => 'Invalid Quantity',
            ];
            return json_encode($result);
        }
        
        if (!Auth::check()) {
            $result = [
                'result' => 'error',
                'message' => 'Not Login Yet.',
            ];
            return json_encode($result);
        }

        ShoppingCart::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
            'qty' => $request->add_qty,
        ]);

        $result = [
            'result' => 'done',
            'message' => 'We have successfully created a new shopping cart',
        ];
        // dd($result);
        return json_encode($result);
    }

}
