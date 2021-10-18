@extends('admin_layout');
@section('admin_content')
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Sửa Sản Phẩm
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
                            @foreach($edit_product as $key => $value)
                            <form role="form" action="{{URL::to('/update-product/')}}/{{$value->PID}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh Mục</label>
                                        <select name="CatID" class="form-control input-lg m-bot15">
                                            @foreach ($cate_product as $key => $cate)
                                            @if ($cate->CatID == $value->CatID)
                                            <option selected value="{{$cate->CatID}}">{{$cate->CateName}}</option>
                                            @else
                                            <option value="{{$cate->CatID}}">{{$cate->CateName}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Tag</label>
                                        <select name="BID" class="form-control input-lg m-bot15">
                                            @foreach ($tag_product as $key => $tag)
                                            @if ($tag->BID == $value->BID)
                                            <option selected value="{{$tag->BID}}">{{$tag->BName}}</option>
                                            @else
                                            <option value="{{$tag->BID}}">{{$tag->BName}}</option>
                                            @endif
                                            @endforeach
    
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="PName">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name="PName" value="{{$value->PName}}">
                                </div>
                                <div class="form-group">
                                    <label for="PCost">Giá Vốn</label>
                                    <input type="text" class="form-control" name="PCost" value="{{$value->PCost}}" >
                                </div>
                                <div class="form-group">
                                    <label for="PPrice">Giá Bán</label>
                                    <input type="text" class="form-control" name="PPrice" value="{{$value->PPrice}}" >
                                </div>
                                <div class="form-group">
                                    <label for="PSize">Size</label>
                                    <input type="text" class="form-control" name="PSize" value="{{$value->PSize}}" >
                                </div>
                                <div class="form-group">
                                    <label for="PStock">Số Lượng Tồn Kho : </label><b>{{$value->PStock}}</b>
                                    <input class="form-control" name="PStock" value="{{$value->PStock}}" >
                                </div>
                                <div class="form-group">
                                    <label for="PPhoto">Hình Ảnh</label> : <b>Nếu không chỉnh sửa sẽ giữ nguyên ảnh gốc</b>
                                    <input type="file" class="form-control" name="PPhoto" value="{{$value->PPhoto}}"  >
                                </div>
                            <button type="submit" name="add_category" class="btn btn-info">Cập Nhật Danh Mục</button>
                        </form>
                        @endforeach
                        </div>

                    </div>
                </section>

        </div>
@endsection