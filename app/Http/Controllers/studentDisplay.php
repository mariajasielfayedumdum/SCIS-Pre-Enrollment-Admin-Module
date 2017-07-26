<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class studentDisplay extends Controller
{
    public function display($idnumber){
        if(Session::has('username') == "admin") {
        $idnumber = DB::table('students')->where('id_number', '=', $idnumber)->get();
        return view('studentprofile', compact('idnumber'));}
    }
    public function preenroll($idnumber){
        if(Session::has('username') == "admin") {
            $idnumber = DB::table('students')->where('id_number', '=', $idnumber)->get();
            return view('preenrollStud', compact('idnumber'));}
    }
    public function confirm($id){
        if(Session::has('username') == "admin") {
            $idnumber = DB::table('students')->where('id_number', '=', $id)->get();
            DB::table('users')->where('username', '=', $id)
                ->update(array('type' => '1'));
            return view('studentprofile', compact('idnumber'));
        }
    }
    public function displayChecklist($idnumber){
        if(Session::has('username') == "admin") {
        $idnumber = DB::table('students')->where('id_number', '=', $idnumber)->get();
        return view('studentChecklist', compact('idnumber'));}
    }

    public function accept($id){
        if(Session::has('username') == "admin") {
      DB::table('overloading')->where('id_number', '=', $id)
            ->update(array('status' => 'Accepted'));
        return view('overload');}
    }
    public function reject($id){
        if(Session::has('username') == "admin") {
        DB::table('overloading')->where('id_number', '=', $id)
            ->update(array('status' => 'Rejected'));
        return view('overload');}
    }
    public function remove($id){
        if(Session::has('username') == "admin") {
        DB::table('overloading')->where('id_number', '=', $id)
            ->update(array('status' => 'Pending'));
        return view('overload');}
    }
    public function add($id, $cc, $t){
        if(Session::has('username') == "admin") {
            DB::insert('insert into pre_enroll (id_number, coursenumber, term) values (?, ?, ?)', [$id, $cc, $t]);
            $stud = DB::table('students')->where('id_number', '=', $id)->get();
            if (count($stud) > 0) {
                return view('preenrollment.studentprenroll')->withDetails($stud)->withQuery($id);
            } else {
                return view('preenrollment.studentprenroll')->withMessage('No data');
            }
        }
    }
    public function del($id, $c){
        if(Session::has('username') == "admin") {
            DB::table('pre_enroll')->where('id_number', '=', $id)
                ->where('coursenumber', '=', $c)
                ->delete();
            $stud = DB::table('students')->where('id_number', '=', $id)->get();
            if (count($stud) > 0) {
                return view('preenrollment.studentprenroll')->withDetails($stud)->withQuery($id);
            } else {
                return view('preenrollment.studentprenroll')->withMessage('No data');
            }
        }
    }
    public function login() {
        $username = Input::get('username');
        $password = Input::get('password');
        $admin = DB::table('users')
            ->where('username', '=', $username)
            ->where('password', '=', $password)
            ->where('type', '=', '4')->get();
        if(count($admin) > 0 ){
           // $user = $username->username;
            Session::put('username', $username);
            return view('layout', compact('username'));
        }
        else{return view('welcome');}
    }
}