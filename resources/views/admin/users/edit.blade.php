@extends('layouts.main')
@section('content')
   <div class="content">
    	<div class="container">
<div class="task-form">    
{!! HTML::ul($errors->all()) !!}

	            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
  						<h1>EDIT USER</h1>
 
    {!! Form::model($user, ['role' => 'form', 'url' => 'admin/users/update/','class' => 'form-horizontal', 'method' => 'PUT']) !!}
 <input type="hidden" value="{{$user->id}}" name="user_id"  />
   
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Full Name</label>
                                <div class="col-sm-9">
        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control','readonly']) !!}
    </div>
    </div>
   
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9"> 
        {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control','readonly']) !!}
    </div>
     </div>
 
             <div class="form-group">
                            	<label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9"> 
        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
    </div>
    </div>
 
             <div class="form-group">
                            	<label class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-9"> 

        {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
    </div>
    </div>
 
    <div class='form-group'>
    <div class="col-sm-12">
        {!! Form::submit('Update', ['class' => 'btn-orange']) !!}
    </div>
    </div>
 
    {!! Form::close() !!}
 
</div>
 
                 </div>
            </div>
        </div>
    </div>
</div>

@stop
