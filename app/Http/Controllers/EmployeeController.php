<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class EmployeeController extends Controller
{
    public function AuthLogin(){
        $EID = Session::get('EID');
        if($EID) {
            return Redirect::to('staff-dashboard');
        }else{
            return Redirect::to('employee_login')->send();
        }
    }
    public function index(){
        return view('employee_login');
    }
    public function ShowStaff(){
        //$this->AuthLogin();
        return view('staff.staff_all');
    }

    public function staffdashboard(Request $request){
        $EEmail = $request->EEmail;
        $EPass = md5($request->EPass);

        $result = DB::table('tbl_employee')->where('EEmail', $EEmail)->where('EPass', $EPass)->first();
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        if ($result){
            Session::put('EEmail', $result->EEmail);
            Session::put('EPass', $result->EPass);
            return Redirect::to('/staff-dashboard');
        }else{
            Session::put('message','Username or Password is not correct');
            return Redirect::to('/employee_login');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('EName',null);
        Session::put('EID', null);
        return Redirect::to('/employee_login');
    }

    public function checkOrderlist(){
        return view('staff.order_list');
    }
    public function checkOrderProcess(){

        return view('staff.order_proccess');
    }
  

}