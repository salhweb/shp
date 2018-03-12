@extends('layouts.main')
@section('content')
   <div class="content">
    	<div class="container">
@if (Session::has('message'))
    <div class="alert alert-info  alert-dismissable">
     		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{!! Session::get('message') !!}
	</div>
@endif
	
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert  alert-dismissable'>
     		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {!! $error !!}
             </div>
        @endforeach
    @endif
    
            <div class="page-title">
              <div class="title_left">
                <h3>Schools </h3>
              </div>
              <div class="form-group col-md-2 pull-right">
<a href="{{url('add-student')}}" ><input class="btn  btn-primary" value="Add Student" type="submit">
</a></div>
 </div>
            <div class="clearfix"></div>
                          
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Filter Schools</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<div class="row">
                   <div class="col-lg-10 col-lg-offset-1">
 	<center><h1>Students</h1></center>
      
        {!! Form::open(['method'=>'get']) !!}

<div class="form-group col-md-3">
                    {!! Form::open(['url' => 'schools-listing','method'=>'get','class'=>'form-horizontal form-label-left']) !!}
                    
                    {!! Form::text('user_keyword', app('request')->input('user_keyword'), ['placeholder' => 'Search Name','class' => 'form-control']) !!}
    {!! Form::hidden('user_search',1) !!}
                    
<div class="form-group col-md-2">
{!! Form::submit('Search Users', ['class' => 'btn  btn-primary']) !!}
</div>
<div class="form-group col-md-2">
<a class = 'btn  btn-danger' href='{!! URL::to('students') !!}'>Reset Filters</a>
</div>
{!! Form::close() !!}
					</div>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="x_panel">
				
					  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Student Listing 
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                     @if(isset($users))
     <?php echo $users->appends(Input::except('page'))->render(); ?>
    @if(count($users)>0)
                      <thead>
                        <tr>
						<th>S/no</th>
                          <th>Name</th>
                          <th>Roll No.</th>
                          <th>Class</th>
                          <th>Father Name</th>
						  <th>Edit</th>
						  <th>Status</th>
						  <th>GID</th>
						  <th><input type="checkbox" id="check-all" class="flat"></th>
                        </tr>
                      </thead>


                      <tbody>
                      @foreach ($users as $user)
                        <tr>
						<td><a href="{!! URL::to('student/'. $user->student_id) !!}">{!! $user->student_id !!}</a></td>
                          <td>{!! $user->name !!}</td>
                          <td>{!! $user->roll_number !!}</td>
                          <td>@if(isset($user->class_name))   {!!  $user->class_name !!} @endif</td>
                          <td>{!! $user->father_name !!}</td>
                          <td><a href="#">Edit</a></td>
                          <td><a href="#">Active</a></td>
						  
						  
						  <td><a href="#">Active</a></td>
						  <td><input type="checkbox" id="check-all" class="flat"></td>
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
             

 
@stop
