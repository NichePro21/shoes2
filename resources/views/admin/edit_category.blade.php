@extends('admin_layout');
@section('admin_content')
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập Nhật Danh Mục
                    </header>
                    <div class="panel-body">
                        <?php 
    $message = Session::get('message');
        if($message){
     echo '<p class="text-alert">'.$message.'</p>' ;
            Session::put('message',null);
    }
    ?>
    SELECT * FROM `tbl_categories`,`tbl_categories_detail` WHERE tbl_categories_detail.CatID = tbl_categories.CatID  AND tbl_categories.CatID = 1;
    @foreach($edit_category_product as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->CatID)}}" method="post">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="category_product_name">Name Category</label>
                                <input type="text" value="{{$edit_value->CateName}}" class="form-control" name="category_product_name">
                            </div>
                            <button type="submit" name="update_category" class="btn btn-info">Cập Nhật Danh Mục</button>
                        </form>
                        </div>

                    </div>
                    @endforeach
                </section>

        </div>
@endsection