@extends('layouts.main')
@section('content')  
   <div class="content">
    	<div class="container">
         @if (Session::has('message'))
    <div class="alert alert-warning">{!! Session::get('message') !!}</div>
@endif
            <div class="task-form">   
	@if(Auth::guest())
		<div class="row">
                	<div class="col-sm-offset-1 col-md-9"> 
			   <form method="POST" action="{{ url('login') }}" class="form-horizontal">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}">
				        <h1 title="Enter your login information">Enter your login information</h1>
			@if($errors->all())
			<div class="alert alert-danger">
			@foreach($errors->all() as $error)
			    <p>{{ $error }}</p>
			@endforeach
			 </div>
			@endif
            @if(isset($_GET['user_id']) && $_GET['user_id'] !='')
            		@if(isset($user_email))
            		{!! Form::hidden('email', $user_email[0]->email, array('placeholder'=>'Email Address', 'class'=>"form-control")) !!}
                    @endif
            @else
			      <div class="form-group">
                                <div class="col-sm-12">
                        {!! Form::text('email', old('email'), array('placeholder'=>'Email Address', 'class'=>"form-control")) !!}
                         </div>
			 </div>
             @endif
			     <div class="form-group">
                                <div class="col-sm-12">
			{!! Form::password('password', ['placeholder'=>'Password']) !!}
			   </div>
			 </div>
			      <div class="form-group">
                                <div class="col-sm-12">
                       {!! Form::submit('Login', ['class' => 'btn-orange']) !!}
				</div>
			</div>
                        <div><!--<a href="{{ url('/password/email') }}" class="plain text-uppercase">Forget your password?</a>--></div>
                    </form>
			<!--<h2> Don't have account?</h2> <a href="{{ url('/register') }}" class="btn">Register</a>-->
                    </div>
	@else
		@if(Auth::user())
			Welcome {{ Auth::user()->name }} 
			<a class="btn btn-green text-uppercase" href="{{ url('logout') }}" title="Logout">logout</a>
			 
		@endif
	@endif
                </div>
            </div>
        </div>
    </div>
</div>

@stop
