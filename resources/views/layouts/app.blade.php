<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>InfyOm Generator</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <script src="jquery-3.3.1.min.js"></script>

    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <b>InfyOm</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        @if (!is_null( Auth::user()->created_at))
                                             <small>Miembro desde {!! Auth::user()->created_at->format('Y-m-d') !!}</small>
                                        @endif
                                      
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    InfyOm Generator
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    @yield('scripts')
</body>

<!--SCRIPT PARA LOS CANDIDATOS-->
<script>

    var parentesco = document.getElementById("parentesco");
    var otroParentesco = document.getElementById("otroParentesco");
     otroParentesco.maxlength = 30;

    if (parentesco.value == "12") {

        otroParentesco.disabled='';
        otroParentesco.required = true;


    }else {
       otroParentesco.value = '';
       otroParentesco.disabled='true';

   }

   
   function changetextboxParentesco()
   {
    if (parentesco.value == "12") {

        otroParentesco.disabled='';
        otroParentesco.required = true;

    } else {
        otroParentesco.value = '';
        otroParentesco.disabled='true';

    }
}

</script>

<script >
    


     var padreOMadrePC = document.getElementById("padreOMadrePC");
      var padreOMadreSC = document.getElementById("padreOMadreSC");
      function primerContacto(){
        if(padreOMadrePC.value==null || padreOMadrePC.value=='' || padreOMadrePC.value=='1' || padreOMadrePC.value=='2'){    
            document.getElementById("datosPrimerContacto").style.display = "none";
            $('#datosPrimerContacto').find('input, textarea, button, select').attr('disabled','disabled');
            $('#datosPrimerContacto').find('input, textarea, button, select').attr('required',false);
        }

        if(padreOMadrePC.value=='0'){
            document.getElementById("datosPrimerContacto").style.display = "block";
            $('#datosPrimerContacto').find('input, textarea, button, select').removeAttr('disabled');
            $('#datosPrimerContacto').find('input, textarea, button, select').attr('required',true);
        }
      }

      function segundoContacto(){
          if(padreOMadreSC.value==null || padreOMadreSC.value=='' || padreOMadreSC.value=='1' || padreOMadreSC.value=='2'){    
            document.getElementById("datosSegundoContacto").style.display = "none";
            $('#datosSegundoContacto').find('input, textarea, button, select').attr('disabled','disabled');
            $('#datosSegundoContacto').find('input, textarea, button, select').attr('required',false);
        }
        if(padreOMadreSC.value=='0'){
            document.getElementById("datosSegundoContacto").style.display = "block";
            $('#datosSegundoContacto').find('input, textarea, button, select').removeAttr('disabled');
            $('#datosSegundoContacto').find('input, textarea, button, select').attr('required',true);
        }
      }


</script>



<script >
function start() {
  primerContacto();
  segundoContacto();
}
window.onload = start;
var padreOMadrePC = document.getElementById('padreOMadrePC');
var padreOMadreSC = document.getElementById('padreOMadreSC');
padreOMadrePC.onchange = primerContacto;
padreOMadreSC.onchange = segundoContacto;
window.onload = start;

</script>


<!-- Validador Rut-->
    <script src="{{ asset('js/validarRUT.js')}}"></script>

</html>