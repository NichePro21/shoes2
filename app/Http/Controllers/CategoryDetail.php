<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryDetail extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_detail_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_categories')->get();
        return view('admin.add_category_detail')->with('all_category_product',$all_category_product);
    }
    public function all_category_detail_product(){
        $this->AuthLogin();

        $all_category_detail_product = DB::table('tbl_categories_detail')->get();
        $manager_category = view('admin.all_category_detail')->with('all_category_detail_product',$all_category_detail_product);

        return view('admin_layout')->with('admin.all_category_detail',$manager_category);
    }

    public function save_category_detail_product(Request $request){
       $data = array();
        $data['CateDName'] = $request->category_detail_product_name;
        $data['CatID'] = $request->category_detail_product_CatID;

        DB::table('tbl_categories_detail')->insert($data);
        Session::put('message','Thêm Danh Mục Sản Phẩm Thành Công!');
        return Redirect::to('add-category');
    }
    public function unactive_category_detail($CateDID){
        DB::table('tbl_categories_detail')->where('CateDID',$CateDID)->update(['category_detail_status'=>1]);
        Session::put('message','Ẩn Thành Công');
        return Redirect::to('all-category');
    }
    public function active_category_detail($CateDID){
        DB::table('tbl_categories_detail')->where('CateDID',$CateDID)->update(['category_detail_status'=>0]);
        Session::put('message','Đã Được Hiển Thị');
        return Redirect::to('all-category');
    }
    public function edit_category_detail_product($CateDID){
        $edit_category_detail_product = DB::table('tbl_categories_detail')->where('CateDID', $CateDID)->get();
        $manager_category = view('admin.edit_category')->with('edit_category_detail_product',$edit_category_detail_product);

        return view('admin_layout')->with('admin.edit_category',$manager_category);
    }
    public function update_category_detail_product(Request $request,$CateDID){
        $data = array();
        $data['CateDName'] = $request->category_detail_product_name;
        Session::put('message','<b>Cập Nhật Thành Công</b>');
        DB::table('tbl_categories_detail')->where('CateDID', $CateDID)->update($data);
        return Redirect::to('all-category');

    }
    public function delete_category_detail_product($CateDID){
        DB::table('tbl_categories_detail')->where('CateDID', $CateDID)->delete();
        Session::put('message','Xóa Thành Công');
        return Redirect::to('all-category');
    }
    public function show_category_detail_home($CateDID){

        $cate_product = DB::table('tbl_categories_detail')->where('category_detail_status','0')->orderby('CateDID','desc')->get();
        $tag_product = DB::table('tbl_tags')->where('tag_status','0')->orderby('tag_id','desc')->get();

        $category_detail_by_id = DB::table('tbl_products')
        ->join('tbl_categories_detail','tbl_products.CateDID','=','tbl_categories_detail.CateDID')
        ->where('tbl_products.CateDID',$CateDID)->get();
        
        $CateName = DB::table('tbl_categories_detail')->where('tbl_categories_detail.CateDID',$CateDID)->limit(1)->get();
        return view('pages.category.show_category')->with('category',$cate_product)->with('tag',$tag_product)->with('category_detail_by_id',$category_detail_by_id)->with('CateName',$CateName);
    }
}
