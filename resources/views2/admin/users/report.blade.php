@extends('layouts.main')
@section('content')
   <div class="content">
    	<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
 	<center><h1>Report</h1></center>
     @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif		
        {!! Form::open(['method'=>'get']) !!}

<div class="form-group col-md-3">
	<label>Start Date</label>
    {!! Form::input('date','start_date', app('request')->input('start_date'), ['placeholder' => 'Start Date','class' => 'form-control']) !!}
    {!! Form::hidden('user_search',1) !!}
</div>
<div class="form-group col-md-3">
	<label>End Date</label>
    {!! Form::input('date','end_date', app('request')->input('end_date'), ['placeholder' => 'End Date','class' => 'form-control']) !!}
    {!! Form::hidden('user_search',1) !!}
</div>
                        
<div class="form-group col-md-2">
<p>&nbsp;</p>
{!! Form::submit('Search Users', ['class' => 'btn  btn-primary']) !!}
</div>
<div class="form-group col-md-2">
<p>&nbsp;</p>
<a class = 'btn  btn-danger' href='{!! URL::to('admin/users') !!}'>Reset Filters</a>
</div>

   <div class="form-group col-md-2">
<p>&nbsp;</p>
			<a href="{!! URL::to('admin/users/create') !!}" class="btn btn-success pull-right">+ Add New User</a>
       </div>                                
{!! Form::close() !!}	
    <div class="table-responsive table">
 
   @if(count($user_report)>0)
   		<table class="table table-bordered table-striped">
        <tr>
        	<th>Checkup Date</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Studnet Name</th>
            <th>Father Name</th>
        </tr>
   		@foreach($user_report as $report)
        <tr>
        <td>{!! $report->checkup_date !!}</td>
        <td>{!! $report->time_in !!}</td>
        <td>{!! $report->time_out !!}</td>
         <td>{!! $report->name !!}</td>
        <td>{!! $report->father_name !!}</td>
        </tr>
        @endforeach
        </table>
    @else
    <h2>No results found.</h2>
    @endif
  
    </div>
 </div>
   
 
</div>
 </div>
@endsection
