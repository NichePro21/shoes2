<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_categories')->orderby('CatID','desc')->get();
        $tag_product = DB::table('tbl_brand')->orderby('BID','desc')->get();
        $cate_detail_product = DB::table('tbl_categories_detail')->orderby('CateDID','desc')->get();



        return view('admin.add_product')->with('cate_product', $cate_product)->with('tag_product',$tag_product)->with('cate_detail_product',$cate_detail_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_categories','tbl_categories.CatID','=','tbl_product.CatID')
        ->join('tbl_brand','tbl_brand.BID','=','tbl_product.BID')
        ->orderby('tbl_product.PID','desc')->get();

        $manager_product = view('admin.all_product')->with('all_product',$all_product);

        return view('admin_layout')->with('admin.all_product',$manager_product);
    }

    public function save_product(Request $request){
       $data = array();
       
        $data['BID'] = $request->BID;
        $data['CatID'] = $request->CatID;
        $data['PName'] = $request->PName;
        $data['PCost'] = $request->PCost;
        $data['PPrice'] = $request->PPrice;
        $data['PSize'] = $request->PSize;
        $data['PStock'] = $request->PStock;
        $get_image = $request->file('PPhoto');

        if($get_image){
            //$get_name_image = $get_image->getClientOriginalExtension();

            $new_image = $data['PName'].'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['PPhoto'] = $new_image;
            DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm Sản Phẩm Thành Công!');
        return Redirect::to('all-product');
        }
        $data['PPhoto'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm Sản Phẩm Thành Công!');
        return Redirect::to('all-product');
        
    }
    public function unactive_product($product_id){
        DB::table('tbl_products')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Ẩn Thành Công');
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
        DB::table('tbl_products')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Đã Được Hiển Thị');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_categories')->orderby('CatID','desc')->get();
        $tag_product = DB::table('tbl_brand')->orderby('BID','desc')->get();

        $edit_product = DB::table('tbl_product')->where('PID', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('tag_product',$tag_product);

        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $request,$product_id){
        $data = array();
        $data['BID'] = $request->BID;
        $data['CatID'] = $request->CatID;
        $data['PName'] = $request->PName;
        $data['PCost'] = $request->PCost;
        $data['PPrice'] = $request->PPrice;
        $data['PSize'] = $request->PSize;
        $data['PStock'] = $request->PStock;
        $get_image = $request->file('PPhoto');

        if($get_image){
            //$get_name_image = $get_image->getClientOriginalExtension();
            $new_image = $data['PName'].'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['PPhoto'] = $new_image;
            DB::table('tbl_product')->where('PID',$product_id)->update($data);
            Session::put('message','Cập Nhật Sản Phẩm Thành Công!');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('PID',$product_id)->update($data);
        Session::put('message','Cập Nhật Sản Phẩm Thành Công!');
        return Redirect::to('all-product');

    }
    public function delete_product($product_id){
        DB::table('tbl_products')->where('product_id', $product_id)->delete();
        Session::put('message','Xóa Thành Công');
        return Redirect::to('all-product');
    }
    //END ADMIN PAGES TABLE

    public function details_product($product_id){

        $cate_product = DB::table('tbl_categories')->orderby('CatID','desc')->get();
        $brand = DB::table('tbl_brand')->orderby('BID','desc')->get();

        $detail_product = DB::table('tbl_product')
        ->join('tbl_categories','tbl_categories.CatID','=','tbl_product.CatID')
        ->join('tbl_brand','tbl_brand.BID','=','tbl_product.BID')
        ->where('tbl_product.PID',$product_id)->get();

        foreach($detail_product as $key => $value){
        $category_id = $value->CatID;
        
        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_categories','tbl_categories.CatID','=','tbl_product.CatID')
        ->join('tbl_brand','tbl_brand.BID','=','tbl_product.BID')
        ->where('tbl_categories.CatID',$category_id)->whereNotIn('tbl_product.BID',[$product_id])->get();
        

        return view('pages.sanpham.show_details')->with('category',$cate_product)->with('brand',$brand)->with('detail_product',$detail_product)->with('related_product',$related_product);
    }


}
