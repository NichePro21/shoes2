@extends('staff_layout')
         @section('staff_content')
         <div class="row">
            <div class="col-md-12" style="padding-top: 2%;">
                <div class="white-box printableArea">
                    <h3><b>OrderNo</b> <span class="pull-right">#1</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">StaffOne</b></h3>
                                    <p class="text-muted m-l-5">Cach Mang Thang 8,
                                        <br> Quan 3,
                                        <br> Tp. Hồ Chí Minh,
                                        <br> 0902054736</p>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>To,</h3>
                                    <h4 class="font-bold">Hoang,</h4>
                                    <p class="text-muted m-l-30">Phuong 8,Hoang Hoa Tam,
                                        <br> Quan Tan Binh
                                        <br> 0977657643</p>
                                    <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 15 Oct 2021</p>
                                
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Description</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Cost</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Giày Cá Sấu</td>
                                            <td class="text-right">2 </td>
                                            <td class="text-right"> 150,000 VND </td>
                                            <td class="text-right"> 300,000 VND </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>Croon</td>
                                            <td class="text-right"> 3 </td>
                                            <td class="text-right"> 150,000 VND </td>
                                            <td class="text-right"> $450,000 VND </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <h3><b>Total :</b> 750,000 VND</h3> </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">
                                <button class="tst3 btn btn-success" type="submit"> Đã Thanh Toán </button>
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



         @endsection