<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

/**
 * ADMIN MODULE
 */
Route::get('/studentManagement', function(){
    if(Session::has('username') == "admin") {
            return view('student');
        }  else{
        return view('welcome');
    }
});
Route::post('/studentManagement', 'searchController@search');
Route::get('/subjectManagement', function(){
    if(Session::has('username') == "admin") {
            return view('subject');
        }  else{
        return view('welcome');
    }
});
Route::get('/preenrollment', function(){
    if(Session::has('username') == "admin") {
            return view('preenroll');
        }  else{
        return view('welcome');
    }
});
Route::get('/overload', function(){
    if(Session::has('username') == "admin") {
            return view('overload');
        }  else{
        return view('welcome');
    }
});
Route::get('/petitions', function(){
    if(Session::has('username') == "admin") {
            return view('petitions');
        }  else{
        return view('welcome');
    }
});
Route::get('/checklists', function(){
    if(Session::has('username') == "admin") {
            return view('checklist');
        }  else{
        return view('welcome');
    }
});
Route::get('/', function(){
    return view('welcome');
});
Route::get('/dashboard', function(){
    if(Session::has('username') == "admin") {
            return view('layout');
        }  else{
        return view('welcome');
    }
});
Route::post('/loginAuth', 'studentDisplay@login');
Route::get('/logout', function() {
    Session::forget('username');

    if(!Session::has('username'))
    {
        return view('welcome');
    }
});
//student profile
Route::post('/studentprofile/{idnumber}', 'studentDisplay@display');
Route::get('/studentprofile/{idnumber}', function(){
    if(Session::has('username') == "admin") {
            return view('studentprofile');
        }
    else{
        return view('welcome');
    }
});
Route::get('/studentprofile/{idnumber}',[
    'as' => 'student',
    'uses' =>'studentDisplay@display']);
//student checklist
Route::post('/studentChecklist/{idnumber}', 'studentDisplay@displayChecklist');
Route::get('/studentChecklist/{idnumber}', function(){
    if(Session::has('username') == "admin") {
            return view('studentChecklist');
        }
    else{
        return view('welcome');
    }
});
Route::get('/studentChecklist/{idnumber}',[
    'as' => 'student',
    'uses' =>'studentDisplay@displayChecklist']);

//overload accept/reject
Route::post('/accept/{id}', 'studentDisplay@accept');
Route::get('/accept/{id}', 'studentDisplay@accept');
Route::post('/reject/{id}', 'studentDisplay@reject');
Route::get('/reject/{id}', 'studentDisplay@reject');
Route::post('/remove/{id}', 'studentDisplay@remove');
Route::get('/remove/{id}', 'studentDisplay@remove');

//search functions (pre-enroll page)
Route::any('/search', function(){
    if(Session::has('username') == "admin") {
        $searched = Input::get('search');
        $stud = DB::table('students')->where('id_number', '=', $searched)->get();
        if(count($stud) > 0){
            return view('preenrollment.studentprenroll')->withDetails($stud)->withQuery($searched);
        } else {
            return view ('/preenroll');
        }
    }
    else{
        return view('welcome');
    }
});
Route::any('/searchavail/{id}', function($id){
    if(Session::has('username') == "admin") {
        $stud = DB::table('students')->where('id_number', '=', $id)->get();
        $searched = Input::get('searchavail');
        $studs = DB::table('offered_subjects')
            ->join('subjects', 'subjects.subjectID', '=', 'offered_subjects.subjectID')
            ->where('subjects.coursenumber', 'LIKE', '%' . $searched . '%')
            ->orWhere('subjects.destitle', 'LIKE', '%' . $searched . '%')
            ->orderby('subjects.coursenumber', 'asc')
            ->get();
        if (count($studs) > 0) {
            return view('preenrollment.subjects')->withDetail($studs)
                ->withDetails($stud)->withQuery($searched);
        } else {
            return view('preenrollment.subjects')->withMessage('No data');
        }
    }
    else{
        return view('welcome');
    }
});
//student mgmt page
Route::any('/searchstud', function(){
    if(Session::has('username') == "admin") {
    $searched = Input::get('search');
    $stud = DB::table('students')
        ->orWhere('id_number', 'LIKE', '%' . $searched . '%' )
        ->orWhere('last_name', 'LIKE', '%' . $searched . '%' )
        ->orWhere('first_name', 'LIKE', '%' . $searched . '%' )
        ->orWhere('course', 'LIKE', '%' . $searched . '%' )
        ->orWhere('id_number', '=', $searched)
        ->get();
    if(count($stud) > 0){
        return view('student')->withDetails($stud)->withQuery($searched);
    } else {
        return view ('student')->withMessage('STUDENT NOT FOUND! ');
    }
    }
    else{
        return view('welcome');
    }
});
Route::any('/sortStud', function(){
    if(Session::has('username') == "admin") {
    $course = Input::get('sortcourse');
    $year = Input::get('sortyear');
    $studs = DB::table('students')
        ->where('year', '=', $year)
        ->orWhere('course', '=', $course)
        ->orWhere('year', '=', $year)
        ->where('course', '=', $course)
        ->get();
    if(count($studs) > 0){
        return view('student')->withDetail($studs)->withQuery($year, $course);
    } else {
        return view ('student')->withMessage('STUDENT NOT FOUND! ');
    }}  else{
        return view('welcome');
    }
});
//subject mgmt page
Route::any('/searchpresubj', function(){
    if(Session::has('username') == "admin") {
    $searched = Input::get('input');
    $stud = DB::table('subjects')->join('pre_enroll', 'subjects.coursenumber', '=', 'pre_enroll.coursenumber')
        ->select('subjects.coursenumber', 'subjects.destitle', 'subjects.units', 'pre_enroll.term')
        ->where('subjects.coursenumber', 'LIKE', '%' . $searched . '%' )
        ->orWhere('subjects.destitle', 'LIKE', '%' . $searched . '%' )
        ->DISTINCT()->orderby('coursenumber', 'asc')
        ->get();
    if(count($stud) > 0){
        return view('subject')->withDetails($stud)->withQuery($searched);
    } else {
        return view ('subject')->withMessage('SUBJECT NOT FOUND! ');
    }}  else{
        return view('welcome');
    }
});
Route::any('/searchallsubj', function(){
    if(Session::has('username') == "admin") {
    $searched = Input::get('inputs');
    $studs = DB::table('subjects')->where('coursenumber', 'LIKE', '%' . $searched . '%' )
        ->orWhere('destitle', 'LIKE', '%' . $searched . '%' )
        ->orWhere('type', 'LIKE', '%' . $searched . '%' )
        ->get();
    if(count($studs) > 0){
        return view('subject')->withDetail($studs)->withQuery($searched);
    } else {
        echo "hi";
    }}  else{
        return view('welcome');
    }
});
//sort subj main page
Route::any('dashboard/sort/', function(){
    if(Session::has('username') == "admin") {
        $term = Input::get('type');
        $sort = DB::table('pre_enroll')
            ->join('subjects', 'subjects.coursenumber', '=', 'pre_enroll.coursenumber')
            ->join('enr_stat','enr_stat.coursenumber', '=', 'pre_enroll.coursenumber' )
            ->select('subjects.coursenumber', 'subjects.destitle', 'pre_enroll.term', 'subjects.units', 'enr_stat.number_of_students')
            ->where('pre_enroll.term', '=', $term)
            ->DISTINCT();
        if(count($sort) > 0){
            return view('layout')->withDetail($sort)->withQuery($term);
        } else {
            return view ('layout')->withMessage('SUBJECT NOT FOUND! ');
        }
    }  else{
        return view('welcome');
    }
});
//subject profile
Route::post('/subjectprofile/{coursenumber}/{term}', 'subjectDisplay@display');
Route::get('/subjectprofile/{coursenumber}/{term}', 'subjectDisplay@display');
Route::get('/subjectprofile/{coursenumber}/{term}', function(){
    if(Session::has('username') == "admin") {
    return view('subjectprofile');}
    else{
        return view('welcome');
    }
});
Route::get('/subjectprofile/{coursenumber}/{term}',[
    'as' => 'subject',
    'uses' =>'subjectDisplay@display']);

//open subject
Route::post('/opensubject/{coursenumber}', 'subjectDisplay@open');
Route::get('/opensubject/{coursenumber}', 'subjectDisplay@open');
Route::get('/opensubject/{coursenumber}', function(){
    if(Session::has('username') == "admin") {
    return view('opensubject');}
    else{
        return view('welcome');
    }
});
Route::get('/opensubject/{coursenumber}',[
    'as' => 'opensubject',
    'uses' =>'subjectDisplay@open']);
Route::post('/subjectManagement/{sub}', 'subjectDisplay@insert');

Route::post('/petitions/{subj}/{t}', 'subjectDisplay@add');
Route::get('/openpetitionedsubject/{subj}', 'subjectDisplay@adds');
Route::get('/openpetitionedsubject/{subj}',[
    'as' => 'openpetitionedsubject',
    'uses' =>'subjectDisplay@adds']);
//pre-enrollment manipulation
Route::post('/add/{id}/{cc}/{t}', 'studentDisplay@add');
Route::get('/add/{id}/{cc}/{t}' ,[
    'as' => 'preenroll',
    'uses' =>'studentDisplay@add']);
Route::post('/delete/{id}/{c}', 'studentDisplay@del');
Route::get('/delete/{id}/{c}',[
    'as' => 'preenroll',
    'uses' =>'studentDisplay@del']);
//petitions viewing of students
Route::post('/petitions/view/{subj}', 'subjectDisplay@petition');
Route::get('/petitions/view/{subj}', 'subjectDisplay@petition');
Route::get('/petitions/view/{subj}', function(){
    if(Session::has('username') == "admin") {
    return view('petitionedSubject');}
    else{
        return view('welcome');
    }
});
Route::get('/petitions/view/{subj}',[
    'as' => 'petitions',
    'uses' =>'subjectDisplay@petition']);

Route::post('/preenrollStud/{idnumber}', 'studentDisplay@preenroll');
Route::post('/preenrollStud/{idnumber}', 'studentDisplay@preenroll');
Route::post('/preenrollStud/{idnumber}', function(){
    if(Session::has('username') == "admin") {
        return view('preenrollStud');}
    else{
        return view('welcome');
    }
});
Route::post('/preenrollStud/{idnumber}',[
    'as' => 'preenrollStud',
    'uses' =>'studentDisplay@preenroll']);

Route::post('/confirm/{idnumber}', 'studentDisplay@confirm');