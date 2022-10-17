<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;


class BannerController extends Controller
{
    //
    public function index() {
        $banners = Banner::get();
        $header = '';
        $slot = '';

        return view('banner.index',compact('banners', 'header', 'slot'));
    }

    // banner functions
    public function create() {
        return view('/banner/create');
    }
    public function store(Request $request) {
        // dd($request->all());
        $path = Storage::disk('public')->put('/banner', $request->banner_img);
        // dd('path = '.$path, Storage::disk('public'), Storage::disk('local'));
        $path = '/storage/public/'.$path;
        Banner::create([
            'img_path' => $path,
            'img_opacity' => $request->banner_opacity,
            'weight' => $request->img_weight,
        ]);
        // put('儲存資料夾', 儲存資料)
        return redirect('/banner');
    }
    public function edit($id) {
        $banner = Banner::find($id);

        return view('/banner/edit', compact('banner'));
    }
    public function update(Request $request, $id) {
        // 幾乎跟create相同
        $path = Storage::disk('public')->put('/banner', $request->banner_img);
        $path = '/storage/public/'.$path;

        // 方法一
        // Banner::find($id)->update([
        //     'img_path' => $path,
        //     'img_opacity' => $request->banner_opacity,
        //     'weight' => $request->img_weight,
        // ]);

        $banner = Banner::find($id);
        $target = str_replace('/storage', '', $banner->img_path);
        Storage::disk('local')->delete($target); // 先刪除舊檔案
        $banner->img_path = $path;
        $banner->img_opacity = $request->banner_opacity;
        $banner->weight = $request->img_weight;
        $banner->save();    // **記得儲存**

        return redirect('/banner');
    }
    public function destroy($id) {
        // dd($id);
        $banner = Banner::find($id);
        // dd('path = '.$banner->img_path);
        $target = str_replace('/storage', '', $banner->img_path);
        Storage::disk('local')->delete($target);
        $banner->delete();

        return redirect('/banner');
    } 

    public function table() {
        return view('banner.test_data_table');
    }
}
