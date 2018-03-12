@extends('layouts.admin_layout')
 
@section('title') Create User @stop
 
@section('content')

<div class="row-fluid inner-nav">
<div class='col-lg-4 col-lg-offset-4'>
  	<nav class="navbar navbar-inverse">     
	<table width="100%">
	<tr><td><h1>EDIT USER</h1></td>
		<td><a href="{{ URL::to('admin/users') }}" class="btn btn-info pull-right">View Users</a>
		</tr>
	    </table>
	</nav>
	
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif
 
  
 
    {{ Form::model($user, ['role' => 'form', 'url' => 'admin/users/' . $user->user_id, 'method' => 'PUT']) }}
 
   
    <div class='form-group'>
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
    </div>
 
    <div class='form-group'>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
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
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop
