@extends('admin_layout');
@section('admin_content')
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Category Detail
                    </header>
                    <div class="panel-body">
                        <?php 
    $message = Session::get('message');
        if($message){
     echo '<p class="text-alert">'.$message.'</p>' ;
            Session::put('message',null);
    }
    ?>
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/save-categorydetail-product')}}" method="post">
                                {{csrf_field()}}
                                
                            <div class="form-group">
                                <label for="category_detail_product_name">Name CategoryDetail</label>
                                <input type="text" class="form-control" name="category_detail_product_name" placeholder="Category product title">
                            </div>
                            <div class="form-group">
                            <select name="category_detail_product_CatID" class="form-control input-lg m-bot15">
                                @foreach($all_category_product as $key => $product)
                                <option value="{{$product->CatID}}">{{$product->CateName}}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển Thị</label>
                                    <select name="category_product_status" class="form-control input-lg m-bot15">
                                        <option value="0">Hidden</option>
                                        <option value="1">Show</option>
                                    </select>
                            </div>
                            <button type="submit" name="add_category" class="btn btn-info">Thêm Danh Mục</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
@endsection