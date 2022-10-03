<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\FilesController;
use App\Models\Product;
use App\Models\Product_img;
use Illuminate\Validation\Rules\Exists;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        $product_box_1 = Product::orderby('id', 'desc')->take(4)->get();
        $product_box_2 = Product::orderby('id', 'desc')->skip(4)->take(4)->get();

        $main_product = Product::inRandomOrder()->first();
        $second_img = Product_img::get();

        return view('product.product', compact('products', 'product_box_1', 'product_box_2', 'second_img'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $path = FilesController::imgUpload($request->product_img, 'product');
        $product = Product::create([
            'img_path' => $path,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_detail' => $request->product_detail,
            'product_qty' => $request->product_qty,
        ]);
        
        if ($request->second_img != "") {
            foreach ($request->second_img as $index => $element) {
                $second_path = FilesController::imgUpload($element, 'product');
                Product_img::create([
                    'img_path' => $second_path,
                    'product_id' => $product->id,
                ]);
            }
        }

        return redirect('/product');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('/product/edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Process main image
        $product = Product::find($id);
        FilesController::deleteUpload($product->img_path);

        $path = FilesController::imgUpload($request->product_img, 'product');
        $product->img_path = $path;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_detail = $request->product_detail;
        $product->product_qty = $request->product_qty;
        $product->save();

        // Process secondary image 
        if ($request->hasFile('second_img')) {
            // If second_image upload is not NULL, then do ... 
            foreach ($request->second_img as $index => $element) {
                $second_path = FilesController::imgUpload($element, 'product');
                Product_img::create([
                    'img_path' => $second_path,
                    'product_id' => $product->id,
                ]);
            }
        }
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        
        // 可能有多張圖片，先取得後用foreach刪除
        $img = Product_img::where('product_id', $id)->get();
        foreach ($img as $index => $element) {
            FilesController::deleteUpload($element->img_path);
            $element->delete();
        }

        FilesController::deleteUpload($product->img_path);

        $product->delete();

        return redirect('/product');
    }

    public function delete_img($img_id) {
        $img = Product_img::find($img_id);
        $origin_id = $img->product_id; // product_id == id in Product
        FilesController::deleteUpload($img->img_path);
        $img->delete();

        return redirect('product/edit/'.$origin_id);
    }

    public function product_info($id) {
        $product_info = Product::find($id);

        return view('product.product_info', compact('product_info'));
    }
}
