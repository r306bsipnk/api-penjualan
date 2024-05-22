<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(){
        return Product::paginate();
    }

    public function store(){
        $id = request('id');
        $r = Product::query()->where('id', $id)->first();
        if($r == null){
            return $this->simpanbaru();
        }else{
            return $this->update($id);
        }
    }

    private function simpanbaru(){
        $r = Product::query()->insertGetId([
            'product_code' => request('product_code'),
            'nama' => request('nama'),
            'spesifikasi' => request('spesifikasi'),
            'harga' => request('harga'),
            'toko_id' => request('toko_id'),
            'created_at'=> Carbon::now()
        ]);
        return response()->json([
            'result' => $r
        ]);
    }

    private function update($id){
        Product::query()->where('id', $id)->update([
            
                'product_code' => request('product_code'),
                'nama' => request('nama'),
                'spesifikasi' => request('spesifikasi'),
                'harga' => request('harga'),
                'toko_id' => request('toko_id'),
                'updated_at'=> Carbon::now()
            
        ]);
        return request()->json([
            'result'=>$id
        ]);
    }

    public function delete(){
        $id = request('id');
        $r = Product::query()->where('id', $id)->delete();
        return response()->json([
            'result' => $r
        ]);
    }
}
