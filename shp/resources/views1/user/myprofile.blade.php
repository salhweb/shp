@extends('layouts.main')
@section('content')  
   <div class="content">
    	<div class="container">
            <div class="task-form"> 
	
@if ($errors->has())
    @foreach ($errors->all() as $error)
         <div class='bg-danger alert'>{!! $error !!}</div>
    @endforeach
@endif
 
    {!! Form::open(['role' => 'form', 'url' => 'register']) !!}

    <div class='form-group'>
        {!! Form::label('fname', 'First Name') !!}
        {!! Form::text('first_name', null, ['placeholder' => 'Your First Name', 'class' => 'form-control']) !!}
    </div>	

    <div class='form-group'>
        {!! Form::label('lname', 'Last Name') !!}
        {!! Form::text('last_name', null, ['placeholder' => 'Your Last Name', 'class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
        {!! Form::label('phone', 'Phone') !!}
        {!! Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) !!}
    </div>

	   <div class='form-group'>
 {!! Form::label('user_city', 'Your City') !!}

	
   </div>

    <div class='form-group'>
        {!! Form::label('email', 'Email Address (It will be used for login)') !!}
        {!! Form::email('email', null, ['placeholder' => 'Email Address', 'class' => 'form-control']) !!}
    </div>	

   <div class='form-group'>
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
    </div>
 
    <div class='form-group'>
        {!! Form::label('password_confirmation', 'Confirm Password') !!}
        {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
    </div>
 
    <div class='form-group'>
	{!! Form::checkbox('age_confirmation', 1 ) !!}
        {!! Form::label('age_confirmation', 'I confirm that I am 18 years or older') !!}
        
    </div>
	 
    <div class='form-group'>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>
 
    {!! Form::close() !!}
 
</div>
 </div>
@stop
