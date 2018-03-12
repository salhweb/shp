<html>
    <head>
<meta charset="utf-8">
<meta content="width=1366px" name="viewport">
<meta content="telephone=no" name="format-detection">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="" name="description">
<meta content="" name="author">
<style>
.site_header .header_logo_part {
    -moz-box-flex: 0;
    -moz-box-ordinal-group: 2;
    flex: 0 0 auto;
    order: 1;
}
.site_header .header_logo_part .logo {
    display: block;
}
</style>
        <title>WELLOKID</title>
{!! HTML::style('assets/css/bootstrap.min.css') !!}
{!! HTML::style('assets/css/styles111.css') !!}
{!! HTML::style('assets/css/custom.min.css') !!}
{!! HTML::style('assets/css/font-awesome.min.css') !!}
{!! HTML::script('assets/js/jquery.min.js') !!}
{!! HTML::script('assets/js/bootstrap.min.js') !!}
{!! HTML::script('assets/js/bootstrap-multiselect.js') !!}
{!! HTML::script('assets/js/scripts.js') !!}
{!! HTML::script('assets/js/less-1.3.0.min.js') !!}
{!! HTML::script('assets/js/jquery-ui.min.js') !!}
{!! HTML::style('assets/css/jquery-ui.min.css') !!}
{!! HTML::style('assets/css/bootstrap-multiselect.css') !!}
    </head>
    <body class="innerpage nav-md">
	<div class="container body">
    <div class="main_conatiner">
	 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title" href="http://wellokid.com">
<img src="{{ Config::get('app.SITE_URL') }}/assets/images/site_logo.png" data-no-retina="" style="height:63px;" alt=""><span>WELLOKID</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
			@if(Auth::user())
            <div class="profile clearfix">
              <div class="profile_pic">
			              @if(Auth::user()->pic !='')
            	<img  src="{{ Config::get('app.SITE_URL') }}/storage/user_pics/{{Auth::user()->pic}}"  alt="{{ ucfirst(trans(Auth::user()->name)) }}" class="img-circle profile_img"/>
            @else
            	<img src="{{ Config::get('app.SITE_URL') }}/storage/user_pics/default.png"  alt="{{ ucfirst(trans(Auth::user()->name)) }}" class="img-circle profile_img" />
            @endif
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ ucfirst(trans(Auth::user()->name)) }} </h2>
              </div>
            </div>
			@endif
            <!-- /menu profile quick info -->
			<br />
			 <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
			 @if(Auth::user())
			<ul id="menu-main-menu" class="main-menu  nav side-menu">
             <li >
                      <a href="{{url()}}">Home</a>
                    </li>
            @if(Auth::user()->getRole() =='administrator')
           
                     <li >
                      <a href="{{url('/admin/users/create')}}">Add User</a>
                    </li>
					<!-- li >
                      <a href="{{url('/admin/schools/create')}}">Add School</a>
                    </li -->
					<li >
                      <a href="{{url('/admin/doctor_types/create')}}">Add Doctor Type</a>
                    </li>
                     <li >
                      <a href="{{url('/admin/users')}}">View Users</a>
                    </li> 
                    <li >
                      <a href="{{url('/admin/idcard')}}">Id Cards</a>
                    </li>
             
			@elseif(Auth::user()->getRole() =='nurse')
           
                     <li >
                      <a href="{{url('/users/create')}}">Add New Student</a>
                    </li>
                     <li >
                      <a href="{{url('/users')}}">View Students</a>
                    </li> 
            
			 @elseif(Auth::user()->getRole() =='student')
           
                     <li >
                      <a href="{{url('/homework')}}">View Home Work</a>
                    </li>
                    <li >
                      <a href="{{url('/my-health-report')}}">My Health Report</a>
                    </li>
                     <li >
                      <a href="{{url('/health-medical-detail')}}">Fill Health & Medical History</a>
                    </li> 
                     <li >
                      <a href="{{url('/doctor-recommendations')}}">Doctor Recommendations</a>
                    </li> 
                     <li >
                      <a href="{{url('/additional-reports')}}">Additional Reports</a>
                    </li> 
            
			@elseif(Auth::user()->getRole() =='doctor')				
					 <li  >
                      <a href="{{url('/view-student-detail')}}">Student Detail</a>
                    </li>
                     <li  >
                      <a href="{{url('/student-checkup')}}">Student Treatment</a>
                    </li>
					
			@elseif(Auth::user()->getRole() =='school')
				
					  <li  >
                      <a href="{{url('/add-daily-home-work')}}">Add Daily Home Work</a>
                    </li>
                      <li >
                      <a href="{{url('/students')}}">View Students</a>
                    </li> 
				
			@endif	
			</ul>						
            @endif  

            </div>
			</div>
		</div>
	</div>
	
	<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				  	@if(Auth::user())
			        @if(Auth::user()->pic !='')
						<img  src="{{ Config::get('app.SITE_URL') }}/storage/user_pics/{{Auth::user()->pic}}"  alt="{{ ucfirst(trans(Auth::user()->name)) }}" class=""/>
					@else
						<img src="{{ Config::get('app.SITE_URL') }}/storage/user_pics/default.png"  alt="{{ ucfirst(trans(Auth::user()->name)) }}" class="" />
					@endif
                   {{ ucfirst(trans(Auth::user()->name)) }}
                    <span class=" fa fa-angle-down"></span>
					@endif
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
              
				@if(Auth::user()!=null)
						<li><a class="" href="{{ url('change-password') }}" title="Change Password">Change Password</a></li>
						<li><a class="" href="{{ url('logout') }}" title="Logout">Logout</a></li>
				@else
				<li><a class="" href="{{ url('login') }}" title="Login">Login</a></li>
				@endif
                   
                  </ul>
                </li>
				@if(Auth::user()!=null)
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
					
				@if(Auth::user()->getUnreadMessagesCount() > 0) 
                    <span class="badge bg-green">{{Auth::user()->getUnreadMessagesCount()}}</span>
				@endif
                  </a>
                 
                
                </li>
				@endif
				<li>
				 <a href="mailto:info@wellokid.com"> <i class="fa fa-envelope"></i> info@wellokid.com</a>
				</li>
				<li>
				 <a href="tel:+919812423345"> <i class="fa fa-phone"></i>  +91-98124-23345</a>
				</li>
              </ul>
            </nav>
          </div>

        </div>
<div class="right_col" role="main">
      
            @yield('content')
			</div>
</div>       
    </body>
</html>
