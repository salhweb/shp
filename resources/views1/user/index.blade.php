@extends('layouts.admin_layout')
 
@section('title') Users @stop
 
@section('content')
<div class="row-fluid inner-nav">
<div class="col-lg-10 col-lg-offset-1">
 
	<nav class="navbar navbar-inverse">     
	<table width="100%">
	<tr><td><h1>USERS</h1></td>
		<td><a href="{{ URL::to('admin/users') }}" class="btn btn-info pull-right">View Users</a>
		<a href="{{ URL::to('admin/users/create') }}" class="btn btn-success pull-right">+ Add New User</a></td>
		</tr>
	    <tr><td colspan=3>
	  <div class="form-group pull-right">	
			{{!! Form::open(array('url' => 'admin/users','method'=>'get','id'=>'filterform')) !!}}
			Keyword(Name/Email) 
			<input type="text" name="keyword" value="{{ Input::get('keyword') }}" size="20">			 
			<input type="submit" class="btn" value="Search"  style="margin-top:-3px;">
			<input type="reset" class="btn" value="Reset" onClick="this.form.reset()" style="margin-top:-3px;">
			{!! Form::close() !!}}
		  </div>
	</td></tr>		
	    </table>
	</nav>
 @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Email (Username)</th>
		    <th width="5%">Active</th>
                    <th width="15%">Date/Time Added</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
 
            <tbody>
          
                @foreach ($users as $user)
                <tr>
                     <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>

                    <td>{{ $user->created_at->format('F d, Y') }}</td>
                    <td>
                        <a href="users/{{ $user->user_id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>                     {{!! Form::open(['url' => '/admin/users/' . $user->user_id, 'method' => 'DELETE']) !!}}
                        {{!! Form::submit('Delete', ['class' => 'btn btn-danger'])!!}}
                        {{!! Form::close() !!}}
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 
   
 
</div>
 </div>
@stop
