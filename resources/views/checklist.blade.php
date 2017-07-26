<!DOCTYPE html>
<html>
@include('header.header')
<style>
    .w3-button:hover{
        color:#000!important;
        background-color:#ccc!important
    }
    .w3-transparent, .w3-hover-none:hover{
        background-color:transparent!important
    }
    .w3-hover-none:hover{
        box-shadow:none!important
    }
    .w3-grey,.w3-hover-grey:hover,.w3-gray,.w3-hover-gray:hover{color:#000!important;background-color:#bbb!important}
    .w3-light-grey,.w3-hover-light-grey:hover,.w3-light-gray,.w3-hover-light-gray:hover{color:#000!important;background-color:#f1f1f1!important}
    .w3-dark-grey, .w3-hover-dark-grey:hover,.w3-dark-gray,.w3-hover-dark-gray:hover{color:#fff!important;background-color:#616161!important}
    .w3-bar{width:100%;overflow:hidden}.w3-center .w3-bar{display:inline-block;width:auto}
    .w3-bar .w3-bar-item{padding:18px 16px;float:left;width:20%;border:none;outline:none;display:block}
    .w3-bar .w3-dropdown-hover,.w3-bar .w3-dropdown-click{position:static;float:left}
    .w3-bar .w3-button{white-space:normal}
    .w3-bar-block .w3-bar-item{width:100%;display:block;padding:8px 16px;text-align:left;border:none;outline:none;white-space:normal;float:none}

</style>
<body>
<div id="wrapper">
    <br>
    @include('layouts.nav')
    @include('layouts.sidebar')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Checklists</h4> </div>
            </div>
            <div class="w3-bar w3-light-grey" style="height: 50px;">
                <button class="w3-bar-item w3-button" onclick="openCourse('BSIT')">BS Information Technology</button>
                <button class="w3-bar-item w3-button" onclick="openCourse('BSCS')">BS Computer Science</button>
                <button class="w3-bar-item w3-button" onclick="openCourse('BLIS')">BS Library and Information Science</button>
                <button class="w3-bar-item w3-button" onclick="openCourse('BSIS')">BS Information Science </button>
                <button class="w3-bar-item w3-button" onclick="openCourse('BSMath')">BS Mathematics</button>
            </div>

            <div id="BSIT" class="course">
                <br>
                <h4><b>BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</b></h4>
                @include('checklist.bsit')
            </div>

            <div id="BSCS" class="course" style="display:none">
                <br>
                <h4><b>BACHELOR OF SCIENCE IN COMPUTER SCIENCE</b></h4>
                @include('checklist.bscs')
            </div>
            <div id="BSIS" class="course" style="display:none">
                <br>
                <h4><b>BACHELOR OF SCIENCE IN INFORMATION SCIENCE</b></h4>
                @include('checklist.bsis')
            </div>
            <div id="BLIS" class="course" style="display:none">
                <br>
                <h4><b>BACHELOR IN LIBRARY AND INFORMATION SCIENCE</b></h4>
                @include('checklist.blis')
            </div>
            <div id="BSMath" class="course" style="display:none">
                <br>
                <h4><b>BACHELOR OF SCIENCE IN MATHEMATICS</b></h4>
                @include('checklist.bsmath')
            </div>
        </div>
    </div>
    @include('footer.footer')
</div>

<script>
    function openCourse(cityName) {
        var i;
        var x = document.getElementsByClassName("course");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }
</script>
@include('script.script')
</body>
</html>