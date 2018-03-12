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
       <h3> Welcome {{ ucfirst(trans(Auth::user()->name)) }} </h3>
        <div class="row">
  
			
            <div class="col-md-2">  
            @if(Auth::user()->pic !='')
            	<img class"img-responsive img" src="storage/user_pics/{{Auth::user()->pic}}"  alt="{{ ucfirst(trans(Auth::user()->name)) }}" style="max-width:100%;" />
            @else
            	<img class"img-responsive " src="storage/user_pics/default.png"  alt="{{ ucfirst(trans(Auth::user()->name)) }}" style="max-width:100%;" />
            @endif
            </div>	
           @if(Auth::user()->hasRole('student'))
                      <div class="col-md-4">
               <table class="table table-bordered">
           <tr>
           <td>Name</td><td>{{ ucfirst($user_detail[0]->name) }}</td>
           </tr>
           <tr>
           <td>Father’s Name</td><td>{{ ucfirst($user_detail[0]->father_name) }}</td>
           </tr>
           <tr>
           <td>Address</td><td>{{ $user_detail[0]->address }}</td>
           </tr>
           <tr>
           <td>Contact Number:</td><td></td>
           </tr>
           <tr>
           <td>Age</td><td></td> 
           </tr>
           <tr>
           <td></td><td></td>  
           </tr>
           </table>
            <div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
  aria-valuenow="{{ $overall_health_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $overall_health_percentage }}%">
  Health Score {{ $overall_health_percentage }}% 
  </div>
</div>
           </div>
@if(isset($user_basic_detail))
<?php print_r($user_basic_detail); ?>
@endif
 <div class="col-md-4">
               <table class="table table-bordered">
           <tr>
</tr>
</table>
</div>
	   @endif		 
		@endif
	@endif
  
                </div>
            </div>
        </div>
    </div>
</div>

@stop
