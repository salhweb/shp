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
{!! HTML::style('assets/css/styles.css') !!}
{!! HTML::script('assets/js/jquery.min.js') !!}
{!! HTML::script('assets/js/bootstrap.min.js') !!}
{!! HTML::script('assets/js/bootstrap-multiselect.js') !!}
{!! HTML::script('assets/js/scripts.js') !!}
{!! HTML::script('assets/js/less-1.3.0.min.js') !!}
{!! HTML::script('assets/js/jquery-ui.min.js') !!}
{!! HTML::style('assets/css/jquery-ui.min.css') !!}
{!! HTML::style('assets/css/bootstrap-multiselect.css') !!}
    </head>
    <body class="innerpage">
    <div class="canvas">
    <div class="header">
    
<div id="site_top_panel">
<div class="container">
<div class="row_text_search">
<div id="top_panel_text">Contact us: <i class="fa fa-phone"></i>  <a href="tel:+919812423345">+91-98124-23345</a> <i class="fa fa-envelope"></i> <a href="mailto:shp@wellokid.com"> shp@wellokid.com</a></div>
</div>
<div class="col-sm-6 pull-right">

        <div class="person-col">
      
        	<div class="btn-group">
              <button aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
              @if(Auth::user()!=null)

		 <!--span class="icon"><img src="{{ Config::get('app.SITE_URL') }}/storage/user_pics/{{Auth::user()->pic}}"></span-->{{ ucfirst(trans(Auth::user()->name)) }} 	
		@endif
		
              </button>
              <ul class="dropdown-menu pull-right">
               
		@if(Auth::user()!=null)
        		<li><a class="" href="{{ url('change-password') }}" title="Change Password">Change Password</a></li>
                <li><a class="" href="{{ url('logout') }}" title="Logout">Logout</a></li>
		@else
		<li><a class="" href="{{ url('login') }}" title="Login">Login</a></li>
		@endif
	
              </ul>
            </div>
        </div>
        	
</div>
</div>
</div>
<div class="header_box">
	<div class="container">
       <div class="row">
          <div class="col-sm-3"
			<div class="header_logo_part" role="banner">
								<a style="margin-top:18px;margin-bottom:18px;height:63px;" class="logo" href="http://wellokid.com">
<img src="{{ Config::get('app.SITE_URL') }}/assets/images/site_logo.png" data-no-retina="" style="height:63px;" alt=""></a>
                    </div>
                    </div>
                    	<div class="col-sm-9 ">
            @if(Auth::user())

			<ul id="menu-main-menu" class="main-menu pull-right ">
             <li class="menu-item">
                      <a href="{{url()}}">Home</a>
                    </li>
            @if(Auth::user()->getRole() =='administrator')
           
                     <li class="menu-item">
                      <a href="{{url('/admin/users/create')}}">Add User</a>
                    </li>
					<li class="menu-item">
                      <a href="{{url('/admin/doctor_types/create')}}">Add Doctor Type</a>
                    </li>
                     <li class="menu-item">
                      <a href="{{url('/admin/users')}}">View Users</a>
                    </li> 
                    <li class="menu-item">
                      <a href="{{url('/admin/idcard')}}">Id Cards</a>
                    </li>
             
			@elseif(Auth::user()->getRole() =='nurse')
           
                     <li class="menu-item">
                      <a href="{{url('/users/create')}}">Add New Student</a>
                    </li>
                     <li class="menu-item">
                      <a href="{{url('/users')}}">View Students</a>
                    </li> 
            
			 @elseif(Auth::user()->getRole() =='student')
           
                     <li class="menu-item">
                      <a href="{{url('/homework')}}">View Home Work</a>
                    </li>
                    <li class="menu-item">
                      <a href="{{url('/my-health-report')}}">My Health Report</a>
                    </li>
                     <li class="menu-item">
                      <a href="{{url('/health-medical-detail')}}">Fill Health & Medical History</a>
                    </li> 
                     <li class="menu-item">
                      <a href="{{url('/doctor-recommendations')}}">Doctor Recommendations</a>
                    </li> 
                     <li class="menu-item">
                      <a href="{{url('/additional-reports')}}">Additional Reports</a>
                    </li> 
            
			@elseif(Auth::user()->getRole() =='doctor')				
					 <li  class="menu-item">
                      <a href="{{url('/view-student-detail')}}">Student Detail</a>
                    </li>
                     <li  class="menu-item">
                      <a href="{{url('/student-checkup')}}">Student Treatment</a>
                    </li>
					
			@elseif(Auth::user()->getRole() =='school')
				
					  <li  class="menu-item">
                      <a href="{{url('/add-daily-home-work')}}">Add Daily Home Work</a>
                    </li>
                      <li class="menu-item">
                      <a href="{{url('/students')}}">View Students</a>
                    </li> 
				
			@endif	
            <li class="menu-item">{{Auth::user()->getUnreadMessagesCount()}}
             <a class="red" @if(Auth::user()->getUnreadMessagesCount() > 0) data-bubble="{{Auth::user()->getUnreadMessagesCount()}}" @endif href="{{ url('messages') }}" title="Messages">Messages</a>
             </li>	
			</ul>
						
            @endif                        
                          </div>
             </div>
												
				</div>
				</div>	
               
        <div class="container"> 
   
        	<div class="form-col">
            	
            </div>

        </div>

	
      
            @yield('content')
       
    </body>
</html>
