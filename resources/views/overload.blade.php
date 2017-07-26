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
    input[type=text] {
        width: 15%;
        height: 2%;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 14px;
        font-size: 13px;
        background-color: white;
        background-position: 10px 10px;
        background-repeat: no-repeat;
        padding: 10px 5px 10px 25px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;

    }

    input[type=text]:focus {
        width: 30%;
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
                    <h4 class="page-title">Overload Requests</h4> </div>
            </div>
            <p> <b>Pending Requests</b></p>
            <div class="white-box" style="width: 50%; height: 750px;">
                <div class="table-responsive" style="overflow-y:scroll; height: 680px; width:100%;">
                    <table class="table" style="position: absolute; display: block; z-index: 100; background-color:white;width: 39.5%;">
                        <thead>
                        <tr>
                            <th>Name</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                            <th>IDNo</th><th></th>
                            <th>CourseNo</th>
                            <th>Descriptive Title</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                            <th>Units</th>
                            <th>Action</th><th></th>
                        </tr>
                        </thead>
                    </table>
                    <br><br><br>
                    <table class="table" style="margin-top: -2%;">
                        <tbody>
                            <?php
                            $number = '';
                            $subjects = DB::table('overloading')->join('subjects', 'subjects.subjectID', '=', 'overloading.subjectID')
                                ->join('students', 'overloading.id_number', '=', 'students.id_number')
                                ->select('subjects.coursenumber', 'subjects.subjectID', 'subjects.units', 'subjects.destitle', 'overloading.status', 'students.last_name', 'students.first_name', 'students.id_number' )
                                ->where ('overloading.status', '=', 'Pending')
                                ->get();
                            ?>
                            @foreach ($subjects as $subjects)
                                <tr>
                                    <td class="txt-oflo">{{ $subjects->last_name }}, {{ $subjects->first_name }}</td>
                                    <td class="txt-oflo">{{ $subjects->id_number }}</td>
                                    <td class="txt-oflo">{{ $subjects->coursenumber }}</td>
                                    <td>{{ $subjects->destitle }}</td>
                                    <td class="txt-oflo">{{ $subjects->units }}</td>
                                    <td>
                                        <?php
                                        $accept= "Accepted";
                                        $reject= "Rejected";
                                        $id = $subjects->id_number;
                                        ?>
                                        <a href='/accept/{{$id}}'>
                                            <button class='btn btn-primary btn-sm'  value="Accepted" style="width: 80%;" > Accept
                                            </button>
                                        </a>
                                        <a href='/reject/{{$id}}'>
                                            <button class='btn btn-primary btn-sm'  value="Rejected" style="width: 80%;"> Reject
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                    </table>
                </div>
            </div>
            <p style="width: 42%; position: absolute; top:15%; right: 1%;"> <b>Accepted Requests</b></p>
            <div class="white-box" style="width: 42%; position: absolute; top: 18%;right: 1%;">
                <div class="table-responsive"  style="overflow-y:scroll; height: 300px; ">
                    <table class="table" style="position: absolute; display: block; z-index: 100; background-color:white;width: 91%;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                            <th>IDNo</th>
                            <th>CourseNo</th>
                            <th>Descriptive Title</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                            <th>Units</th><th></th><th></th><th></th><th></th>
                        </tr>
                        </thead>
                    </table>
                    <br><br><br>
                    <table class="table" style="margin-top: -2%;">
                        <tbody>
                        <?php
                        $number = '';
                        $subjects = DB::table('overloading')->join('subjects', 'subjects.subjectID', '=', 'overloading.subjectID')
                            ->join('students', 'overloading.id_number', '=', 'students.id_number')
                            ->select('subjects.coursenumber', 'subjects.subjectID', 'subjects.units', 'subjects.destitle', 'overloading.status', 'students.last_name', 'students.first_name', 'students.id_number' )
                            ->where ('overloading.status', '=', 'Accepted')
                            ->get();

                        ?>
                        @foreach ($subjects as $subjects)
                            <?php
                            $idno = $subjects->id_number;
                            ?>
                            <tr>
                                <td></td>
                                <td class="txt-oflo">{{ $subjects->last_name }}, {{ $subjects->first_name }}</td>
                                <td class="txt-oflo">{{ $subjects->id_number }}</td>
                                <td class="txt-oflo">{{ $subjects->coursenumber }}</td>
                                <td>{{ $subjects->destitle }}</td>
                                <td class="txt-oflo">{{ $subjects->units }}</td>
                                <td>
                                    <a href='/remove/{{$idno}}'>
                                        <button class='btn btn-primary btn-sm'>Remove
                                        </button>
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <p style="position: absolute; top: 55%; right: 36%;"> <b>Rejected Requests</b></p>
            <div class="white-box" style="width: 42%; position: absolute; top: 58%;right: 1%;">
                <div class="table-responsive"  style="overflow-y:scroll; height: 300px; ">
                    <table class="table" style="position: absolute; display: block; z-index: 100; background-color:white;width: 91%;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                            <th>IDNo</th>
                            <th>CourseNo</th>
                            <th>Descriptive Title</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                            <th>Units</th><th></th><th></th><th></th><th></th>
                        </tr>
                        </thead>
                    </table>
                    <br><br><br>
                    <table class="table">
                        <tbody>
                        <?php
                        $number = '';
                        $subjects = DB::table('overloading')->join('subjects', 'subjects.subjectID', '=', 'overloading.subjectID')
                            ->join('students', 'overloading.id_number', '=', 'students.id_number')
                            ->select('subjects.coursenumber', 'subjects.subjectID', 'subjects.units', 'subjects.destitle', 'overloading.status', 'students.last_name', 'students.first_name', 'students.id_number' )
                            ->where ('overloading.status', '=', 'Rejected')
                            ->get();
                        ?>
                        @foreach ($subjects as $subjects)
                            <?php
                            $idn = $subjects->id_number;
                            ?>
                            <tr>
                                <td></td>
                                <td class="txt-oflo">{{ $subjects->last_name }}, {{ $subjects->first_name }}</td>
                                <td class="txt-oflo">{{ $subjects->id_number }}</td>
                                <td class="txt-oflo">{{ $subjects->coursenumber }}</td>
                                <td>{{ $subjects->destitle }}</td>
                                <td class="txt-oflo">{{ $subjects->units }}</td>
                                <td>
                                    <a href='/remove/{{$idn}}'>
                                        <button class='btn btn-primary btn-sm'>Remove
                                        </button>
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        @include('footer.footer')
</div>
    @include('script.script')
</body>
</html>