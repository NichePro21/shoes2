<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product = DB::table('tbl_categories')->orderby('CatID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('BID', 'desc')->get();
        return view('pages.checkout.login_checkout')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function add_customer(Request $request){ 
        $data = array();
        $data['CName'] = $request->CName;
        $data['CPhone'] = $request->CPhone;
        $data['CAdd'] = $request->CAdd;
        $data['CEmail'] = $request->CEmail;
        $data['Cusername'] = $request->Cusername;
        $data['CPass'] = md5($request->CPass);

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('CID',$customer_id);
        Session::put('CName',$request->Cusername);
    }
    public function checkout(){ 
        return view('pages.checkout.show_checkout');
    }
    public function save_checkout_customer(Request $request){ 
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        
        return Redirect::to('/payment');
    }
    public function payment(){
        echo 'payment';
    }
    public function logout_checkout(){ 
        Session::flush();
        Redirect::to('/login_checkout');
    }
}
