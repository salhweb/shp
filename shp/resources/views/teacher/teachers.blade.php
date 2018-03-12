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
                <h3>Teachers </h3>
              </div>
              <div class="form-group col-md-2 pull-right">
<a href="{{url('add-teacher')}}" ><input class="btn  btn-primary" value="Add Teacher" type="submit">
</a></div>
 </div>
            <div class="clearfix"></div>
                          
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Filter</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<div class="row">
                   <div class="col-lg-10 col-lg-offset-1">
    {!! Form::open(['method'=>'get']) !!}

<div class="form-group col-md-3">

    {!! Form::text('user_keyword', app('request')->input('user_keyword'), ['placeholder' => 'Search Name','class' => 'form-control']) !!}</div>
 
    {!! Form::hidden('user_search',1) !!}

<div class="form-group col-md-2">
{!! Form::submit('Search Teachers', ['class' => 'btn  btn-primary']) !!}
</div>

<div class="form-group col-md-2">
<a class = 'btn  btn-danger' href='{!! URL::to('teachers') !!}'>Reset Filters</a>
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
                    
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                     @if(isset($teachers))
     <?php // echo $teachers->appends(Input::except('page'))->render(); ?>
    @if(count($teachers)>0)
                      <thead>
                        <tr>
						<th>S/no</th>
                          <th>Name</th>
                          <th>Qualification</th>
                          <th>DOB</th>
						 <th>Edit</th>
						 </tr>
                      </thead>


                      <tbody>
                      @foreach ($teachers as $key => $teacher)
                        <tr>
						<td><a href="{!! URL::to('teacher/'. $teacher->teacher_id) !!}">{{$key+1}}</a></td>
                          <td>{!! $teacher->name !!}</td>
                          <td>{!! $teacher->qualification !!}</td>
                          <td>{!! $teacher->birth_date !!}</td>
                          <td><a href="{{url('teacher/'.$teacher->teacher_id.'/edit')}}">Edit</a></td>
                         </tr>
                        @endforeach
                   </tbody>
                    </table>
                    <?php //echo $teacher->appends(Input::except('page'))->render(); ?>
    @else
    <h2>No results found for your search</h2>
    @endif
    @endif
                  </div>
                </div>
             

 
@stop
