@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
 	<center><h1>STUDENTS</h1></center>
    	
 @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
		<a href="{!! URL::to('users/create') !!}" class="btn btn-success pull-right">+ Add New User</a>
       
        {!! Form::open(['method'=>'get']) !!}

<div class="form-group col-md-3">

    {!! Form::text('user_keyword', app('request')->input('user_keyword'), ['placeholder' => 'Search Name','class' => 'form-control']) !!}
    {!! Form::hidden('user_search',1) !!}
</div>

<div class="form-group col-md-2">
 <div class="btn-group btn-group1" style="margin-right:20px;">
  <button style="min-width:150px;" class="btn dropdown-toggle" data-toggle="dropdown" data-inserted-to="user_type" id="user_role_dropdown" aria-expanded="true">Select Class</button>
                     @if (isset($classes))
					 @if (count($classes) > 0)
                                         <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu2" role="menu" id="classes">
					 @foreach($classes as $class)
                                           <li><a tabindex="-1" id="{!!$class->id!!}" href="javascript:void(0);" > {!! ucfirst($class->class_name) !!}</a></li>
                                         @endforeach
                                         </ul>
					@endif
                    @endif
                                     </div>
                                     </div>
                                     {!! Form::hidden('class', app('request')->input('class'),['id'=>'class'] ) !!}

<div class="form-group col-md-2">
{!! Form::submit('Search Users', ['class' => 'btn  btn-primary']) !!}
</div>
<div class="form-group col-md-2">
<a class = 'btn  btn-danger' href='{!! URL::to('users') !!}'>Reset Filters</a>
</div>
{!! Form::close() !!}
                                  
	
    <div class="table-responsive table">
    @if(isset($users))
    @if(count($users)>0)
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    
                    <th>Username</th>
		    <th width="15%">Father Name</th>
            <th>Class</th>
            <th>D.O.B.</th>
                   
                    <th width="46%">Action</th>
                </tr>
            </thead>
 
            <tbody>
            
                @foreach ($users as $user)
                <tr>
                     
                    <td>{!! $user->name !!}</td>
					<td>{!! $user->father_name !!}</td>
                    <td>{!! ucfirst($user->class_name) !!}</td>
                    <td>{!! ucfirst($user->birth_date) !!}</td>
                    <td>
                        <!--a href="users/{!! $user->user_id !!}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a--> 
                        <a href="users/{!! $user->user_id !!}/checkup" class="btn btn-info pull-left" style="margin-right: 6px;">Checkup</a> 
                        <a href="users/{!! $user->user_id !!}/basic-health-detail" class="btn btn-info pull-left" style="margin-right: 6px;">Basic Health Detail</a>  
                        <a href="users/{!! $user->user_id !!}/student-details" class="btn btn-info pull-left" style="">Student Details</a>                   
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    
    @else
    <h2>No results found for your search</h2>
    @endif
    @endif
    </div>
 </div>
   
 
</div>
 </div>
 
 <script type='text/javascript'>
$(document).ready(function(){

	$('#classes li a').click(function(){ 
	     var id = $(this).attr('id');
		 
		$('#class').val(id);
		
		
	});
	});
	</script>
 
@endsection
