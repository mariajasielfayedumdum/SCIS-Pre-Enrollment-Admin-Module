<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class subjectDisplay extends Controller
{
    public function display($coursenumber, $term){
        if(Session::has('username') == "admin") {
        $coursenumber = DB::table('pre_enroll')
            ->join('subjects', 'subjects.coursenumber', '=', 'pre_enroll.coursenumber')
            ->where('pre_enroll.coursenumber', '=', $coursenumber)
            ->where('pre_enroll.term', '=', $term)
            ->DISTINCT()
            ->get();
        return view('subjectprofile', compact('coursenumber'));}
    }

    public function open($coursenumber){
        if(Session::has('username') == "admin") {
        $coursenumber = DB::table('subjects')
            ->where('coursenumber', '=', $coursenumber)
            ->get();
        return view('opensubject', compact('coursenumber'));}
    }

    public function insert($sub){
        if(Session::has('username') == "admin") {
        $term= Input::get('term');
        $course=Input::get('cour');
        DB::insert('insert into offered_subjects (subjectID, term, course) values (?, ?, ?)', [$sub, $term, $course]);
        return view('subject');}
    }
    public function petition($subj){
        if(Session::has('username') == "admin") {
        $view = DB::table('petitions')
            ->join ('subjects', 'subjects.subjectID', '=', 'petitions.subjectID')
            ->join('students', 'students.id_number', '=', 'petitions.id_number')
            ->where('petitions.subjectID', '=', $subj)
            ->get();
        return view('petitionedSubject', compact('view'));}
    }

    public function add($subj, $t){
        if(Session::has('username') == "admin") {
        $course=Input::get('cour');
        DB::insert('insert into offered_subjects (subjectID, term, course) values (?, ?, ?)', [$subj, $t, $course]);
        DB::table('petitions')->where('subjectID', '=', $subj)
            ->where('term', '=', $t)
            ->delete();
        return view('petitions');}
    }

    public function adds($subj){
        if(Session::has('username') == "admin") {
            $subj = DB::table('petitions')
                ->join('subjects', 'subjects.subjectID', '=', 'petitions.subjectID')
                ->where('subjects.subjectID', '=', $subj)
                ->DISTINCT()->LIMIT(1)->get();
            return view('openpetitionedsubject', compact('subj'));}
    }
    public function sortSubjMain(){
        if(Session::has('username') == "admin") {
        $term = Input::get('type');
        $sort = DB::table('pre_enroll')
            ->join('subjects', 'subjects.coursenumber', '=', 'pre_enroll.coursenumber')
            ->join('enr_stat','enr_stat.coursenumber', '=', 'pre_enroll.coursenumber' )
            ->select('subjects.coursenumber', 'subjects.destitle', 'pre_enroll.term', 'subjects.units', 'enr_stat.number_of_students')
            ->where('pre_enroll.term', '=', $term)
            ->DISTINCT();
        return view('layout')->withDetails($sort)->withQuery($term);}
    }

}
