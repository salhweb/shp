@extends('layouts.main')
@section('content')  
   <div class="content">
    	<div class="container">
            <div class="task-form">
	   		<div class="row">
                	<div class="col-sm-offset-1 col-md-9"> 
			         <h1 title="Sign up below">Sign up below</h1>
			@if($errors->all())
			<div class="alert alert-danger">
			@foreach($errors->all() as $error)
			    <p>{{ $error }}</p>
			@endforeach
			 </div>
			@endif
			{!! Form::open(['url' => 'register','method'=>'post','files' => true,'class'=>'register form-horizontal']) !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="form-group">
                                <div class="col-sm-12">
				   
                       {!! Form::text('name',null,array('placeholder'=>'Name (Mandatory)')) !!}
			</div>
			</div>
			      <div class="form-group">
                                <div class="col-sm-12">
</div>
			</div>
			      <div class="form-group">
                                <div class="col-sm-12">
	
                            <fieldset>{!! Form::email('email',null,array('placeholder'=>'Email (Mandatory)')) !!}
</div>
			</div>
			      <div class="form-group">
                                <div class="col-sm-12">
                            <fieldset>{!! Form::password('password',array('placeholder'=>'Password')) !!}
</div>
			</div>
			      <div class="form-group">
                                <div class="col-sm-12">
                            {!! Form::password('password_confirmation',array('placeholder'=>'Password')) !!}
			</div>
			</div>
			<div class="form-group">
                                <div class="col-sm-12">
                                    <span>Upload User Pic</span>
                                     {!! Form::file('user_pic',array('class'=>'upload')) !!}	
                                </div>
                                </div>
			      <div class="form-group">
                                <div class="col-sm-12">
                       {!! Form::submit('sign up',array('class'=>'btn-orange')) !!}</div>
			</div>
                        <div><a href="{{ url('/password/email') }}" class="plain text-uppercase">Forget your password?</a></div>
             {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
