@extends('admin_layout');
@section('admin_content')
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Tag & Actor
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
                            <form role="form" action="{{URL::to('/save-brand')}}" method="post">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="brand_name">Name Brand</label>
                                <input type="text" class="form-control" name="brand_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển Thị</label>
                                    <select name="brand_status" class="form-control input-lg m-bot15">
                                        <option value="0">Hidden</option>
                                        <option value="1">Show</option>
                                    </select>
                            </div>
                            <button type="submit" name="add_tag" class="btn btn-info">Thêm Danh Mục</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
@endsection