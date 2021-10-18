@extends('admin_layout');
@section('admin_content')

                        <div class="white-box">
                            <h3 class="box-title">Brand Table</h3>
                          <div class="table-responsive">
                                <table class="table color-bordered-table purple-bordered-table">
                                    <thead>
                                        <tr>
                                            <?php 
                                  $message = Session::get('message');
                                      if($message){
                                   echo '<p class="text-alert">'.$message.'</p>' ;
                                          Session::put('message',null);
                                  }
                                  ?>
                                            
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th>Hiển Thị</th>
                                            <th>Edit</th>
                                            <th style="width:30px;"></th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_brand as $key => $brand_pro)
                                        <tr>
                                          <td>{{$brand_pro->BID}}</td>
                                          <td>{{$brand_pro->BName}}</td>
                                          <td>
                                            <?php
                                          if($brand_pro->BStatus == 0){
                                            ?>
                                            <a href="{{URL::to('/unactive-brand/'.$brand_pro->BID)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                            <?php
                                             }else{
                                             ?>
                                            <a href="{{URL::to('/active-brand/'.$brand_pro->BID)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                          <?php }
                                          ?>
                                          </td>
                                          <td>
                                            <a href="{{URL::to('/edit-brand/'.$brand_pro->BID)}}" class="editstyling active">
                                              <i class="fa fa-pencil text-success text-active"></i></a>
                                              <hr>
                                              <a href="{{URL::to('/delete-brand/'.$brand_pro->BID)}}" class="deletestyling active" onclick="return confirm('Are you sure you want to delete this brand?')"><i
                                              <i class="fa fa-times text-danger text"></i></a>
                                          </td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                </table>
                            </div>
                        </div>
                    
@endsection