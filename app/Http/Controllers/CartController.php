<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart; 
session_start();

class CartController extends Controller
{

    public function save_cart(Request $request)
    {

        $PID = $request->PID_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('PID', $PID)->first();
        $cate_product = DB::table('tbl_categories')->orderby('CatID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('BID', 'desc')->get();
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::instance('shopping')->add('192ao12', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();
        $data['id'] = $product_info->PID;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->PName;
        $data['price'] = $product_info->PPrice;
        $data['weight'] = $product_info->PPrice;
        $data['options']['size'] = $product_info->PSize;
        $data['options']['image'] = $product_info->PPhoto;

        Cart::add($data);
        Cart::setGlobalTax(10);
        //Cart::destroy();
        return Redirect::to('/show-cart');

        return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function show_cart(){


        $cate_product = DB::table('tbl_categories')->orderby('CatID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('BID', 'desc')->get();
        return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);

        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request) {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');

    }
}
