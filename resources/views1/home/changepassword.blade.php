@extends('layouts.main')
@section('content')  
   <div class="content">
    	<div class="container">
         @if (Session::has('message'))
    <div class="alert alert-warning">{!! Session::get('message') !!}</div>
@endif
@if($errors->all())
			<div class="alert alert-danger">
			@foreach($errors->all() as $error)
			    <p>{{ $error }}</p>
			@endforeach
			 </div>
			@endif
            <div class="task-form">   
	@if(Auth::user())
		<div class="row">
                	<div class="col-sm-offset-1 col-md-9"> 
			   <form method="POST" action="{{ url('change-password') }}" class="form-horizontal">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}">
				        <h1 title="Enter your login information">Change Password</h1>
			
       
		
        
			     <div class="form-group">
                                <div class="col-sm-12">
                <div class="form-group">
                {!! Form::password('old_password', ['class'=>'form-control','placeholder'=>'Old Password']) !!}
                </div>
                <div class="form-group">
                {!! Form::password('password', ['class'=>'form-control','placeholder'=>'New Password']) !!}
                </div>
                <div class="form-group">
                {!! Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'Confirm Password']) !!}
                </div>
			   </div>
			 </div>
			      <div class="form-group">
                                <div class="col-sm-12">
                       {!! Form::submit('Change Password', ['class' => 'btn-orange']) !!}
				</div>
			</div>
                    </form>
			<!--<h2> Don't have account?</h2> <a href="{{ url('/register') }}" class="btn">Register</a>-->
                    </div>
	@else
		@if(Auth::guest())
			
			<a class="btn btn-green text-uppercase" href="{{ url('/login') }}" title="Login">logout</a>
			 
		@endif
	@endif
                </div>
            </div>
        </div>
    </div>
</div>

@stop
