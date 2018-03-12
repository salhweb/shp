@extends('layouts.main')
@section('content')  
   <div class="content">
    	<div class="container">
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
			      <div class="form-group">
                                <div class="col-sm-12">
                        {!! Form::text('email', old('email'), array('placeholder'=>'Email Address', 'class'=>"form-control")) !!}
                         </div>
			 </div>
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
                        <div><a href="{{ url('/password/email') }}" class="plain text-uppercase">Forget your password?</a></div>
                    </form>
<!--			<h2> Don't have account?</h2> <a href="{{ url('/register') }}" class="btn">Register</a>
-->                    </div>
	@else
		@if(Auth::user())
			Welcome {{ Auth::user()->name }} 
            {{ Auth::user()->name }} 
			<a class="btn btn-green text-uppercase" href="{{ url('logout') }}" title="Logout">logout</a>
			 
		@endif
	@endif
    <?php if(Auth::user()!=null)echo ucwords(Auth::user()->getRole()); ?>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
