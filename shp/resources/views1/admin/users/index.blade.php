@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
 	<center><h1>USERS</h1></center>
     @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
		
       
        {!! Form::open(['method'=>'get']) !!}

<div class="form-group col-md-3">

    {!! Form::text('user_keyword', app('request')->input('user_keyword'), ['placeholder' => 'Search Name','class' => 'form-control']) !!}
    {!! Form::hidden('user_search',1) !!}
</div>
<div class="form-group col-md-2">
<select name="user_type" id="user_type" class="form-control">
@if (isset($user_roles))
						 <option value="">Select User Type</option>
					 @if (count($user_roles) > 0)
                                        
					 @foreach($user_roles as $user_role)
                     <?php if(app('request')->input('user_type') == $user_role->id)
					 {
						 $selected='selected';
					 }
					 else
					 {
						  $selected='';
					 }
					 ?>
                                           <option <?php echo $selected ;?> value="{!!$user_role->id!!}" > {!! ucfirst($user_role->role) !!}</option>
                                         @endforeach                                    
					@endif
                    @endif
</select>
</div>
<div class="form-group col-md-2 select_schools <?php if(app('request')->input('user_type') == 5) {} else { echo'hide'; } ?>">
<select name="school" id="school" class="form-control">
						 <option value="">Select School</option>
                     @if (isset($schools))
					 @if (count($schools) > 0)
					 @foreach($schools as $school)
                     <?php if(app('request')->input('school') == $school->id)
					 {
						 $selected='selected';
					 }
					 else
					 {
						  $selected='';
					 }
					 ?>
                           <option <?php echo $selected ;?>  value="{!!$school->id!!}" > {!! ucfirst($school->name) !!}</option>
                                         @endforeach
					@endif
                    @endif
                    </select>
                     </div>
<div class="form-group col-md-2">
{!! Form::submit('Search Users', ['class' => 'btn  btn-primary']) !!}
</div>
<div class="form-group col-md-2">
<a class = 'btn  btn-danger' href='{!! URL::to('admin/users') !!}'>Reset Filters</a>
</div>
{!! Form::close() !!}
                                   
	
    <div class="table-responsive table">
    @if(isset($users))
     <?php echo $users->appends(Input::except('page'))->render(); ?>
    @if(count($users)>0)
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Username</th>
                     <th width="10%">Class</th>
		    <th width="15%">User Type</th>
                   
                    <th width="22%">Action</th>
                </tr>
            </thead>
 
            <tbody>
            
                @foreach ($users as $user)
                <tr>
                     <td>@if(ucfirst($user->role) == 'Student')<a href="{!! URL::to('admin/users/'. $user->id) !!}">{!! $user->id !!}</a> @else {!! $user->id !!} @endif</td>
                    <td>{!! $user->name !!}</td>
                    @if($user->role=='student')
                  <td> @if(isset($user->class_name))   {!!  $user->class_name !!} @endif</td>
         
                    @else
              		 <td>     N/A </td>
                    @endif
					
                    <td>{!! ucfirst($user->role) !!}</td>
                    <td>
                    	@if(ucfirst($user->role) == 'Doctor' || ucfirst($user->role) == 'Nurse')
                    	 <a href="users/{!! $user->id !!}/report" class="btn btn-info pull-left" style="margin-right: 3px;">Report</a> 
                         @endif
                        <a href="users/{!! $user->id !!}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>   
                       {!! Form::open(['url' => '/admin/users/' . $user->id, 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                        {!! Form::close() !!}
                      
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
       <?php echo $users->appends(Input::except('page'))->render(); ?>
    @else
    <h2>No results found for your search</h2>
    @endif
    @endif
    </div>
 </div>
   
 
</div>
 </div>
 <script type="text/javascript">
 $(document).ready(function(){
	 $('#user_type').change(function() {
		 if($(this).val()==5)
		 {
			 $('.select_schools').removeClass('hide');
		 }
		 else
		 {
			  $('.select_schools').addClass('hide');
			  $('#school').val('');

		 }
	 });
 });
 </script>
@endsection
