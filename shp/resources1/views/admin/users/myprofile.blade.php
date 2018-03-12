@extends('layouts.admin_layout')
 
@section('title') Create User @stop
 
@section('content')
  
<div class="row-fluid inner-nav">
<div class='col-lg-4 col-lg-offset-4'>
 
<nav class="navbar navbar-inverse"><h1>Register Now!</h1></nav>
	
@if ($errors->has())
    @foreach ($errors->all() as $error)
         <div class='bg-danger alert'>{{ $error }}</div>
    @endforeach
@endif
 
    {{ Form::open(['role' => 'form', 'url' => 'register']) }}

    <div class='form-group'>
        {{ Form::label('fname', 'First Name') }}
        {{ Form::text('first_name', null, ['placeholder' => 'Your First Name', 'class' => 'form-control']) }}
    </div>	

    <div class='form-group'>
        {{ Form::label('lname', 'Last Name') }}
        {{ Form::text('last_name', null, ['placeholder' => 'Your Last Name', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) }}
    </div>

	   <div class='form-group'>
 {{ Form::label('user_city', 'Your City') }}
	<select name="user_city" >
	@foreach($listlocations as $country)
	  <option disabled value="{{ $country->location_id }}"  @if($selectedlocation == $country->location_id) selected @endif>{{ $country->location_title }}
	   @foreach($country->states as $states)
		<option value="{{ $states->location_id }}" @if($selectedlocation == $states->location_id) selected @endif >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{  $states->location_title }}</option>
	   @endforeach
          </option>					
	@endforeach
	
	</select>
	
   </div>

    <div class='form-group'>
        {{ Form::label('email', 'Email Address (It will be used for login)') }}
        {{ Form::email('email', null, ['placeholder' => 'Email Address', 'class' => 'form-control']) }}
    </div>	

   <div class='form-group'>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
	{{ Form::checkbox('age_confirmation', 1 ) }}
        {{ Form::label('age_confirmation', 'I confirm that I am 18 years or older') }}
        
    </div>
	 
    <div class='form-group'>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
 
    {{ Form::close() }}
 
</div>
 </div>
@stop
