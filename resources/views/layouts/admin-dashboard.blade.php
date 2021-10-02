<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{trans ('admin.Admin') }}|{{trans ('admin.Dashboard') }}</title>
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">  
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">		
  
  <link href="{{ asset('css/admin/adminmain.min.css') }}" rel="stylesheet">	
  <link href="{{ asset('css/admin/jquery.datetimepicker.css') }}" rel="stylesheet">	   
  <link href="{{ asset('css/admin/adminskin-blue.css') }}" rel="stylesheet">	   
  <link href="{{ asset('css/admin/datepicker3.css') }}" rel="stylesheet">	   
  <link href="{{ asset('css/admin/bootstrap3-wysihtml5.css') }}" rel="stylesheet">	   
  <link href="{{ asset('css/csutom-input-file/normalize.css') }}" rel="stylesheet">	   
  <link href="{{ asset('css/admin/bootstrap-select.css') }}" rel="stylesheet">	      
  <link href="{{ asset('css/csutom-input-file/component.css') }}" rel="stylesheet">	   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
  <header class="main-header">
    <a href="/admin/dashboard" class="logo">      
      <span class="logo-mini"><small>{{trans ('admin.Admin') }}</small></span>     
      <span class="logo-lg"><b>{{trans ('admin.Admin') }}|{{trans ('admin.Manager') }}</b></span>
    </a>

   
    <nav class="navbar navbar-static-top" role="navigation">
     
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>
      
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		<ul class="nav navbar-nav navbar-right">
          
          <li class="messages-menu">
           
            <a href="#" class="waves-effect waves-light">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            
          </li>
          
          <!-- Notifications Menu -->
          <li class="notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="waves-effect waves-light">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>            
          </li>
          @if(config('app.locale')  == 'en')
          <li class="dropdown">
            <a href="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" role="button" aria-expanded="false">
              <i class="fa fa-globe fa-right"></i>
              &nbsp;English
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">              
              <li>                      
                <a href="/language/ar"  onclick="event.preventDefault(); document.getElementById('change-lagnuage1-form').submit();">
                  العربية
                </a>

                <form id="change-lagnuage1-form" action="/language/ar" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" role="button" aria-expanded="false">
              <i class="fa fa-globe fa-right"></i>
              &nbsp;العربية
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="/language/en"  onclick="event.preventDefault(); document.getElementById('change-lagnuage2-form').submit();">
                  English
                </a>
                <form id="change-lagnuage2-form" action="/language/en" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>             
            </ul>
          </li>
          @endif  
		  
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle waves-effect" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('images/admin/admin_icon.png')}}"  class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('images/admin/admin_icon.png')}}"  class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}  - {{trans ('admin.Administrator') }}
                  <small></small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div-->
                <div class="pull-right">
                  <a href="{{ route('logout') }}"	onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">{{trans ('admin.Sign_out') }}</a>
				  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
  
  @yield('admin-content')
  
  <footer class="main-footer">    
    <strong>{{trans ('admin.Copyright') }} &copy; 2017 <a href="#">{{trans ('admin.Company') }}</a>.</strong> {{trans ('admin.all_right') }}
  </footer>

 
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- multi-select -->
<script src="{{ asset('js/admin/bootstrap-select.js')}}"></script>

<script  src="{{ asset('js/admin/app.min.js') }}" type="text/javascript">	</script>
<!--script  src="{{ asset('js/admin/dashboard.js') }}" type="text/javascript">	</script-->
<script  src="{{ asset('js/admin/bootstrap-datepicker.js') }}" type="text/javascript">	</script>
<script  src="{{ asset('js/admin/bootstrap3-wysihtml5.all.js') }}" type="text/javascript">	</script>
<script  src="{{ asset('js/custom-file-input.js') }}" type="text/javascript">	</script>

<script>	
	$("#calendar").datepicker();
</script>

</body>
</html>
