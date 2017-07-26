<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/plugins/images/scis.png">
    <title>SCIS Pre-Enrollment</title>
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<style>
    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
    }
    .overlay:target {
        visibility: visible;
        opacity: 1;
    }
    .popup {
        margin: 170px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        width: 30%;
        position: relative;
        transition: all 5s ease-in-out;
    }

    .popup h2 {
        margin-top: 0;
        color: #333;
        font-family: Tahoma, Arial, sans-serif;
    }
    .popup .close {
        position: absolute;
        top: 20px;
        right: 30px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
    }
    .popup .close:hover {
        color: #06D85F;
    }
    .popup .content {
        max-height: 30%;
        overflow: auto;
    }
    .content p{
       text-align: left;
    }
    @media screen and (max-width: 700px){
        .popup{
            width: 70%;
        }
    }
</style>
<body>
<div id="wrapper">
    <br>
    @include('layouts.nav')
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
                <li style="padding: 10px 0 0;">
                    <a href="/dashboard" class="waves-effect"><i class="	fa fa-dashboard fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li>
                    <a href="/studentManagement" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Student Management</span></a>
                </li>
                <li>
                    <a href="/subjectManagement" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Subject Management</span></a>
                </li>
                <li>
                    <a href="/preenrollment" class="waves-effect"><i class="fa fa-address-card fa-fw" aria-hidden="true"></i><span class="hide-menu">Pre-Enrollment</span></a>
                </li>
                <li>
                    <a href="/petitions" class="waves-effect"><i class="	fa fa-folder-open fa-fw" aria-hidden="true"></i><span class="hide-menu">Petitions</span></a>
                </li>
                <li>
                    <a href="/overload" class="waves-effect"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Overload Requests</span></a>
                </li>
                <li>
                    <a href="/checklists" class="waves-effect"><i class="fa fa-calendar-check-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Checklists</span></a>
                </li>

            </ul>
        </div>
    </div>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Petitioned Subjects</h4> </div>
            </div>
            <center>
      <div class="white-box" style="width: 85%; height: 700px;">
          <div class="table-responsive" style="overflow-y: scroll; height: 640px; width: 100%;">
              <table class="table" style="position: absolute; display: block; z-index: 100; background-color:white;width: 69%;">
                  <tr>
                      <th></th>
                      <th>Course Number</th><th></th>
                      <th>Descriptive Title</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                      <th>Units</th>
                      <th>Term</th>
                      <th>Number of Students</th>
                      <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                  </tr>
              </table>
              <br><br><br>
                  <table class="table">
                      <tbody>
                      <?php
                      $number = '';
                      $subjects = DB::table('petitions')
                          ->join('subjects', 'subjects.subjectID', '=', 'petitions.subjectID')
                          ->select('subjects.coursenumber', 'subjects.subjectID', 'subjects.units', 'subjects.destitle', 'petitions.term', 'subjects.subjectID as num' )
                          ->distinct()->get();
                      ?>
                      @foreach ($subjects as $subjects)
                          <?php
                          $course = $subjects->subjectID;
                          $number = DB::table('petitions')
                              ->join('subjects', 'subjects.subjectID', '=', 'petitions.subjectID')
                              ->where('subjects.subjectID', '=', $course)
                              ->get();
                          $count = count($number);
                          ?>
                          @foreach($number as $number)
                              <?php
                              $subj = $number->subjectID;
                              $t = $subjects->term;
                              $subject = $subjects->coursenumber;
                              $destitle = $subjects->destitle;
                              ?>
                          @endforeach

                          <tr>
                              <td></td>
                              <td class="txt-oflo">{{ $subjects->coursenumber }}</td>
                              <td>{{ $subjects->destitle }}</td>
                              <td class="txt-oflo">{{ $subjects->units }}</td>
                              <td class="txt-oflo">{{ $subjects->term }}</td>
                              <td class="txt-oflo">{{ $count }}</td>
                              <td></td>
                              <td>
                                  <a href='/petitions/view/{{$subj}}'>
                                      <button class='btn btn-primary btn-sm'>
                                          <span class="fa fa-address-book" aria-hidden="true"></span> View Details
                                      </button>
                                  </a>
                                  <a href='openpetitionedsubject/{{$subj}}'>
                                      <button class='btn btn-primary btn-sm'>
                                          <span class="fa fa-plus-circle" aria-hidden="true"></span> Open this subject
                                      </button>
                                  </a>
                              </td>
                          </tr>

                      @endforeach
                      </tbody>
                  </table>
          </div>
      </div>
            </center>
        </div>
    </div>
    @include('footer.footer')
</div>
@include('script.script')
</body>
</html>