<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function addCart(Request $request) {
        // 取得欲加入的商品資料
        $product = Product::find($request->product_id);
        if ($request->add_qty > $product->product_qty) {
            // 檢查庫存
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
    public function step01() {
        // Currently login user id
        $user = Auth::id();
        $shopping = ShoppingCart::where('user_id', '=', $user)->get();
        // $shopping = ShoppingCart::where('user_id', $user); Short ver. 
        // dd($shopping, $shopping[0]->product->product_name); // Check data 
        return view('shopping.checkout1', compact('shopping'));
    }
    public function update(Request $request) {
        // 更新step01的品項數量
        // 1. 找商品
        $cart_item = ShoppingCart::find($request->id);
        // 2.覆蓋舊資料
        $cart_item->qty = $request->qty;
        // 3.記得儲存
        $cart_item->save();
        // dd($cart_item);
        return $cart_item;
    }
    public function step02() {
        // dd($request->all());
        // session([
        //     'amount' => $qty,
        //     // 
        // ]);
        $user = Auth::id();
        $cart = ShoppingCart::where('user_id', '=', $user)->get();
        return view('shopping.checkout2', compact('cart'));
    }
    public function step03(Request $request) {
        // payment 1:貨到付款, 2:信用卡, 3:網路ATM, 4:超商代碼
        // shipping_method 1:超商取貨, 2:宅配到府
        // dd($request->all());
        $user = Auth::id();
        $cart = ShoppingCart::where('user_id', '=', $user)->get();

        // 使用session暫存資料
        session([
            "payment" => $request->payment,
            "shipping_method" => $request->shipping_method,
        ]);
        return view('shopping.checkout3', compact('cart'));
        // return redirect('shopping/step3');
        // return redirect()->route('cart.step03');
    }
    public function step04() {
        return view('shopping.checkout4');
    }
}
