<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class brandController extends Controller
{
   
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand(){
        $this->AuthLogin();
        return view('admin.add_brand');
    }
    public function all_brand(){
        $this->AuthLogin();
        $all_brand = DB::table('tbl_brand')->get();
        $manager_brand = view('admin.all_brand')->with('all_brand',$all_brand);

        return view('admin_layout')->with('admin.all_brand',$manager_brand);
    }

    public function save_brand(Request $request){
       $data = array();
        $data['BName'] = $request->brand_name;
        $data['BStatus'] = $request->BStatus;

        DB::table('tbl_brand')->insert($data);
        Session::put('message','Thêm brand Thành Công!');
        return Redirect::to('all-brand');
    }
    public function unactive_brand($BID){
        DB::table('tbl_brand')->where('BID',$BID)->update(['BStatus'=>1]);
        Session::put('message','Ẩn Thành Công');
        return Redirect::to('all-brand');
    }
    public function active_brand($BID){
        DB::table('tbl_brand')->where('BID',$BID)->update(['BStatus'=>0]);
        Session::put('message','Đã Được Hiển Thị');
        return Redirect::to('all-brand');
    }
    public function edit_brand($BID){
        $edit_brand = DB::table('tbl_brand')->where('BID', $BID)->get();
        $manager_brand = view('admin.edit_brand')->with('edit_brand',$edit_brand);

        return view('admin_layout')->with('admin.edit_brand',$manager_brand);
    }
    public function update_brand(Request $request,$BID){
        $data = array();
        $data['BName'] = $request->BName;
        Session::put('message','Cập Nhật Thành Công');
        DB::table('tbl_brand')->where('BID', $BID)->update($data);
        return Redirect::to('all-brand');

    }
    public function delete_brand($BID){
        DB::table('tbl_brand')->where('BID', $BID)->delete();
        Session::put('message','Xóa Thành Công');
        return Redirect::to('all-brand');
    }
    //end admin function page
    public function show_brand_home($BID){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('BStatus','0')->orderby('BID','desc')->get();

        $brand_by_id = DB::table('tbl_products')
        ->join('tbl_brand','tbl_products.BID','=','tbl_brand.BID')
        ->where('tbl_products.BID',$BID)->get();
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.BID',$BID)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
