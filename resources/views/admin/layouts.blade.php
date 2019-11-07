<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ESRIVA</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- STYLESHEET -->
        <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('lte/bower_components/Ionicons/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('lte/dist/css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{asset('lte/dist/css/skins/_all-skins.min.css')}}">
        <link rel="stylesheet" href="{{asset('lte/bower_components/morris.js/morris.css')}}">
        <link rel="stylesheet" href="{{asset('lte/bower_components/jvectormap/jquery-jvectormap.css')}}">
        <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css">

        @yield('css')

        <!-- GOOGLE FONTS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        
        <!-- ADDITIONAL CSS -->
        <style>
            @font-face{
                font-family: mst;
                src: url({{asset('fonts/montserrat-regular.ttf')}});
            }
            
            .mst{
                font-family: mst;
            }

            .box{
                /* border-top-color: #8ed1cd; */
                border-top-color: #1abc9c;
            }

            .navbar-nav > .user-menu > .dropdown-menu{
                padding: 0;
            }

            .navbar-custom-menu > .navbar-nav > li > .dropdown-menu {
                border: none;
            }
        </style>
    </head>
    <body class="hold-transition skin-black sidebar-mini" onload="startTime()">
        <div class="wrapper">
            <!-- HEADER -->
            @include('admin.partials.header')

            <!-- SIDEBAR -->
            @include('admin.partials.sidebar')

            <!-- MAIN CONTENT -->
            <div class="content-wrapper">
                <section class="content-header">
                    @yield('title')
                </section>

                <section class="content container-fluid">
                    @yield('content')
                </section>
            </div>

            <!-- FOOTER -->
            @include('admin.partials.footer')
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('lte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('lte/bower_components/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('lte/bower_components/morris.js/morris.min.js')}}"></script>
        <script src="{{asset('lte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset('lte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
        <script src="{{asset('lte/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('lte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
        <script src="{{asset('lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('lte/bower_components/fastclick/lib/fastclick.js')}}"></script>
        <script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
        <script src="{{asset('lte/dist/js/pages/dashboard.js')}}"></script>
        <script src="{{asset('lte/dist/js/demo.js')}}"></script>
        <script src="{{asset('js/summernote.js')}}"></script>
        
        <script>
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();

                h = checkTime(h);
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML=h+":"+m+":"+s;
                t=setTimeout(function(){startTime()},500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }

                return i;
            }
        </script>

        @yield('js')
    </body>
</html>
