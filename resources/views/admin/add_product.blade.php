@extends('admin_layout');
@section('admin_content')
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Mới Sản Phẩm
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
                            <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputFile">Brand</label>
                                    <select name="BID" class="form-control input-lg m-bot15">
                                        @foreach ($tag_product as $key => $tag)
                                        <option value="{{$tag->BID}}">{{$tag->BName}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Danh Mục</label>
                                    <select name="CatID" class="form-control input-lg m-bot15">
                                        @foreach ($cate_product as $key => $cate)
                                        <option value="{{$cate->CatID}}">{{$cate->CateName}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Category Detail</label>
                                    <select name="CatID" class="form-control input-lg m-bot15">
                                        @foreach ($cate_detail_product as $key => $catedetail)
                                        <option value="{{$cate->CatID}}">{{$catedetail->CateDName}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="PName">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" name="PName" >
                            </div>
                            <div class="form-group">
                                <label for="PCost">Giá Vốn</label>
                                <input type="text" class="form-control" name="PCost" >
                            </div>
                            <div class="form-group">
                                <label for="PPrice">Giá Bán</label>
                                <input type="text" class="form-control" name="PPrice" >
                            </div>
                            <div class="form-group">
                                <label for="PSize">Size</label>
                                <input type="text" class="form-control" name="PSize" >
                            </div>
                            <div class="form-group">
                                <label for="PStock">Số Lượng</label>
                                <textarea class="form-control" name="PStock"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="PPhoto">Hình Ảnh</label>
                                <input type="file" class="form-control" name="PPhoto" >
                            </div>
                            
                            <button type="submit" name="add_category" class="btn btn-info">Thêm Sản Phẩm</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
        
@endsection