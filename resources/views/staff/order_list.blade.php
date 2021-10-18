@extends('staff_layout')
         @section('staff_content')
<div class="col-md-12" style="padding-top: 2%;">
    <div class="panel">
        <div class="panel-heading">Order List</div>
        <div class="table-responsive">
            <table class="table table-hover manage-u-table">
                <thead>
                    <tr>
                        <th width="70" class="text-center">#</th>
                        <th>SeriNo</th>
                        <th>Tên Khách Hàng</th>
                        <th>Ngày Mua</th>
                        <th>View Order Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>S000001</td>
                        <td>Hoàng</td>
                        <td>15 Oct 2021
                            <br><span class="text-muted">10: 55 AM</span></td>
                        
                        <td><a href="{{URL::to('/check-order-process')}}"><button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-more"></i></button></a></td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td class="text-center">2</td>
                        <td>S000002</td>
                        <td>Nghiêm</td>
                        <td>11 Oct 2021
                            <br><span class="text-muted">02: 13 AM</span></td>
                        
                        <td><button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-more"></i></button></td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td class="text-center">2</td>
                        <td>S000003</td>
                        <td>Vương</td>
                        <td>13 Oct 2021
                            <br><span class="text-muted">04: 29 AM</span></td>
                        
                        <td><button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-more"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection