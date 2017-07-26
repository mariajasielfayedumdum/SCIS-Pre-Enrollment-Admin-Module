<!DOCTYPE html>
<html lang="en">
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
<body>
    <div id="wrapper">
        <br>
        @include ('layouts.nav')
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
                        <h4 class="page-title">Dashboard</h4> </div>
                </div>
                <!-- row -->
                <div class="row">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">Pre-Enrolled Students</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger">
                                   <?php 
                                    $count = DB::table('users')->where('type', '=', '1')->get();
                                    $counted = count($count);
                                    echo $counted;
                                   ?>
                                    </h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%"> <span class="sr-only">70% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                    <h5 class="text-muted vb">Non Pre-Enrolled Student</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-megna">
                                        <?php 
                                    $count = DB::table('users')->where('type', '=', '2')->get();
                                    $counted = count($count);
                                    echo $counted;
                                   ?>
                                    </h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                    <h5 class="text-muted vb">Total Students</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-primary"><?php 
                                    $count = DB::table('users')->where('type', '=', '1')
                                        ->orWhere('type', '=', '2')->get();
                                    $counted = count($count);
                                    echo $counted;
                                   ?></h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%"> <span class="sr-only">90% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!--row
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Pre-Enrolled Subjects</h3>
                            <ul class="list-inline text-right">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #dadada;"></i>First Sem</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #dadada;"></i>Short</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #dadada;"></i>Second Sem</h5>
                                </li>
                            <div id="morris-area-chart2" style="height: 370px;"></div>
                        </div>
                    </div>
                </div>
                 -->
                <!--row -->
                @if(isset($detail))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <h3 class="box-title">Most Pre-Enrolled Subjects
                                    </h3>
                                    <div class="table-responsive" style="overflow-y:scroll; height: 680px;">
                                        <table class="table ">
                                            <thead>
                                            <tr>
                                                <th>Course Number</th>
                                                <th>Descriptive Title</th>
                                                <th>Units</th>
                                                <th>Term</th>
                                                <th>Number of Students</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($detail as $sort)
                                                <?php
                                                $courses=$sort->coursenumber;
                                                $ters=$sort->term;
                                                $subject = DB::table('subjects')
                                                    ->join('pre_enroll', 'subjects.coursenumber', '=', 'pre_enroll.coursenumber')
                                                    ->select('pre_enroll.id_number')
                                                    ->where('subjects.coursenumber', '=', $courses)
                                                    ->where('pre_enroll.term', '=', $ters)
                                                    ->DISTINCT()->get();
                                                $number = count($subject);
                                                ?>
                                                <tr>
                                                    <td class="txt-oflo">{{ $sort->coursenumber }}</td>
                                                    <td>{{ $sort->destitle }}</td>
                                                    <td class="txt-oflo">{{ $sort->units }}</td>
                                                    <td class="txt-oflo">{{ $sort->term }}</td>
                                                    <td><span class="text-success">{{ $number }}</span></td>
                                                    <td><a href='/subjectprofile/{{$courses}}/{{$ters}}'>
                                                            <button class='btn btn-primary btn-sm'>
                                                                <span class='glyphicon glyphicon-list' aria-hidden='true'></span>
                                                            </button>
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif(!isset($detail))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Most Pre-Enrolled Subjects
                            </h3>
                            <div class="table-responsive" style="overflow-y:scroll; height: 680px;">
                                <table class="table" style="position: absolute; display: block; z-index: 100; background-color:white;width: 95%;">
                                    <thead>
                                    <tr>
                                        <th></th> <th>Course Number</th>
                                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                                        <th>Descriptive Title</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                                        <th>Units</th><th></th><th></th>
                                        <th>Term</th><th></th><th></th><th></th><th>
                                        <th>Number of Students</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                                    </tr>
                                    </thead>
                                </table>
                                <br><br>
                                <table class="table ">
                                    <tbody>
                                        <?php
                                            $subjects = DB::table('pre_enroll')
                                                ->join('subjects', 'subjects.coursenumber', '=', 'pre_enroll.coursenumber')
                                                ->join('enr_stat','enr_stat.coursenumber', '=', 'pre_enroll.coursenumber' )
                                                ->select('subjects.coursenumber', 'subjects.destitle', 'pre_enroll.term', 'subjects.units', 'enr_stat.number_of_students')
                                                ->DISTINCT()->orderBy('enr_stat.number_of_students', 'desc')->limit(15)->get();

                                        ?>
                                            @foreach ($subjects as $subjects)
                                                <?php
                                                $course=$subjects->coursenumber;
                                                $ter=$subjects->term;
                                                $subject = DB::table('subjects')
                                                    ->join('pre_enroll', 'subjects.coursenumber', '=', 'pre_enroll.coursenumber')
                                                    ->select('pre_enroll.id_number')
                                                    ->where('subjects.coursenumber', '=', $course)
                                                    ->where('pre_enroll.term', '=', $ter)
                                                    ->DISTINCT()->get();
                                                $number = count($subject);
                                                ?>
                                        <tr>
                                            <td class="txt-oflo">{{ $subjects->coursenumber }}</td>
                                            <td>{{ $subjects->destitle }}</td>
                                            <td class="txt-oflo">{{ $subjects->units }}</td>
                                            <td class="txt-oflo">{{ $subjects->term }}</td>
                                            <td><span class="text-success">{{ $number }}</span></td>
                                            <td><a href='/subjectprofile/{{$course}}/{{$ter}}'>
                                                    <button class='btn btn-primary btn-sm'>
                                                        <span class='glyphicon glyphicon-list' aria-hidden='true'></span>
                                                    </button>
                                                </a></td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- /.row -->
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box" style="overflow-y:scroll; height: 500px;">
                            <h3 class="box-title">Most Petitioned Subjects</h3>
                            <div class="message-center">
                            <?php
                                $subj = DB::table('petitions')
                                    ->join('subjects', 'subjects.subjectID', '=', 'petitions.subjectID')
                                    ->select(array('petitions.subjectID', 'subjects.coursenumber', 'subjects.destitle', DB::raw('COUNT(petitions.subjectID) as count')))
                                    ->groupBy('petitions.subjectID')
                                    ->orderBy('count', 'desc')
                                    ->limit(7)
                                    ->get();
                            ?>
                            @foreach($subj as $subj)
                                <?php
                                    $subjID = $subj->subjectID;
                                $subjs = DB::table('petitions')->select('term')->distinct()->where('subjectID', '=', $subjID)->get();
                               // echo $subjID;
                                $c = count($subjs);
                                ?>
                                @foreach($subjs as $subjs)
                                        <a href="/petitions">
                                            <div class="mail-contnet">
                                                <h5>{{ $subj-> coursenumber }} -- {{ $subj->destitle }}</h5>
                                                <span class="mail-desc" ></span>Number of Students: {{ $subj->count}} &nbsp&nbsp Term: {{$subjs->term}}
                                            </div>
                                        </a>
                                    @endforeach
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="white-box" style="overflow-y:scroll; height: 500px;">
                            <h3 class="box-title">Recent Overload Requests</h3>
                            <div class="message-center">
                                <?php
                                    $overload = DB::table('overloading')
                                    ->join('subjects', 'subjects.subjectID', '=', 'overloading.subjectID')
                                    ->join('students', 'students.id_number', '=', 'overloading.id_number')
                                        ->orderBy('overloading.overloadID', 'desc')->limit(5)
                                    ->get();
                                ?>

                                @foreach($overload as $overload)
                                <a href="/overload">
                                    <div class="mail-contnet">
                                        <h5>{{ $overload -> last_name }}, {{ $overload -> first_name }} -- {{  $overload->id_number }}</h5>
                                        <span class="mail-desc"></span> Subject: {{ $overload->coursenumber }} -- {{ $overload->destitle }} <br> Status: {{ $overload->status }}
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            @include('footer.footer')
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
@include('script.script')
</body>

</html>
