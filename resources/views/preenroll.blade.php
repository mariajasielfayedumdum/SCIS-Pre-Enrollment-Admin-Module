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
                    <h4 class="page-title">Pre-Enrollment</h4>
                </div>
            </div>

            <div style="position: absolute; text-align: center; margin: 10px auto; width: 80%;">
                <h4 style="text-align: center;">Pre Enroll Student</h4>
                <br>
                <h5 style="text-align: left; margin-left: 20%;">Search for ID Number: </h5>
                <form role="search" class="app-search hidden-xs" method="post" action="/search/">
                    {{ csrf_field() }}
                    <input type="text" placeholder="..." class="form-control" name="search" value="" style="width: 40%; height: 35%;">
                    <i class="fa fa-search" style="position: relative; right: 2%; color: gray;"></i>
                </form>
            </div>
        </div>
    </div>
    @include('footer.footer')
    <!-- /#page-wrapper -->
    </div>
</div>
<script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/waves.js"></script>
<script src="/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<script src="/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="/plugins/bower_components/morrisjs/morris.js"></script>
<script src="/js/custom.min.js"></script>
<script src="/js/dashboard1.js"></script>
<script src="/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
</body>

</html>
