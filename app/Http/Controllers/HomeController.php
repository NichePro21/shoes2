<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_categories')->orderby('CatID','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('BID','desc')->get();
        // $all_product = DB::table('tbl_products')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_products.category_id')
        // ->join('tbl_tags','tbl_tags.tag_id','=','tbl_products.tag_id')->orderby('tbl_products.product_id','desc')->get();
        $all_product = DB::table('tbl_product')->orderby('PID','desc')->limit(4)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
}
