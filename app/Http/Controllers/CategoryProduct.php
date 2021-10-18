<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category');
    }
    public function all_category_product(){
        $this->AuthLogin();

        $all_category_product = DB::table('tbl_categories')->get();
        $manager_category = view('admin.all_category')->with('all_category_product',$all_category_product);

        return view('admin_layout')->with('admin.all_category',$manager_category);
    }

    public function save_category_product(Request $request){
       $data = array();
        $data['CateName'] = $request->category_product_name;

        DB::table('tbl_categories')->insert($data);
        Session::put('message','Thêm Danh Mục Sản Phẩm Thành Công!');
        return Redirect::to('add-category');
    }
    public function unactive_category($CatID){
        DB::table('tbl_categories')->where('CatID',$CatID)->update(['category_status'=>1]);
        Session::put('message','Ẩn Thành Công');
        return Redirect::to('all-category');
    }
    public function active_category($CatID){
        DB::table('tbl_categories')->where('CatID',$CatID)->update(['category_status'=>0]);
        Session::put('message','Đã Được Hiển Thị');
        return Redirect::to('all-category');
    }
    public function edit_category_product($CatID){
        $edit_category_product = DB::table('tbl_categories')->where('CatID', $CatID)->get();
        $manager_category = view('admin.edit_category')->with('edit_category_product',$edit_category_product);

        return view('admin_layout')->with('admin.edit_category',$manager_category);
    }
    public function update_category_product(Request $request,$CatID){
        $data = array();
        $data['CateName'] = $request->category_product_name;
        Session::put('message','<b>Cập Nhật Thành Công</b>');
        DB::table('tbl_categories')->where('CatID', $CatID)->update($data);
        return Redirect::to('all-category');

    }
    public function delete_category_product($CatID){
        DB::table('tbl_categories')->where('CatID', $CatID)->delete();
        Session::put('message','Xóa Thành Công');
        return Redirect::to('all-category');
    }
    public function show_category_home($CatID){

        $cate_product = DB::table('tbl_categories')->where('category_status','0')->orderby('CatID','desc')->get();
        $tag_product = DB::table('tbl_tags')->where('tag_status','0')->orderby('tag_id','desc')->get();

        $category_by_id = DB::table('tbl_products')
        ->join('tbl_categories','tbl_products.CatID','=','tbl_categories.CatID')
        ->where('tbl_products.CatID',$CatID)->get();
        
        $CateName = DB::table('tbl_categories')->where('tbl_categories.CatID',$CatID)->limit(1)->get();
        return view('pages.category.show_category')->with('category',$cate_product)->with('tag',$tag_product)->with('category_by_id',$category_by_id)->with('CateName',$CateName);
    }
}
