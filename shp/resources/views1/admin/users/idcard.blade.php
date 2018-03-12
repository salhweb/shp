@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
 	
     @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
	


     {!! Form::open(['method'=>'get']) !!}
    {!! Form::hidden('user_search',1) !!}

<div class="form-group col-md-3">

 <select name="school_id" id="school_id" class="form-control">
 <option>Select School</option>
 @foreach($schools as $school)
 
 <option <?php if(isset($_GET['school_id']) && $_GET['school_id'] == $school->id) {echo 'selected'; } ?>  value="{{$school->id}}">{{$school->name}}</option>
 @endforeach
 </select>
 </div>
 <div class="form-group col-md-3">
  <select name="class_id" id="class_id" class="form-control">
 <option>Select Class</option>
 @foreach($classes as $class)
 <option <?php if(isset($_GET['class_id']) && $_GET['class_id'] == $class->id) {echo 'selected'; } ?>  value="{{$class->id}}">{{$class->class_name}}</option>
 @endforeach
 </select>
 </div>
 
                                     {!! Form::hidden('user_type', app('request')->input('user_type'),['id'=>'user_type'] ) !!}
<div class="form-group col-md-2">
{!! Form::submit('Generate PDF', ['class' => 'btn  btn-primary']) !!}
</div>
<div class="form-group col-md-2">
<a class = 'btn  btn-danger' href='{!! URL::to('admin/idcard') !!}'>Reset Filters</a>
</div>
{!! Form::close() !!}
            <br />
<br />                        
	@if(isset($pdf) && $pdf !='')
    	<a href="{{url($pdf)}}" target="_blank" class="btn btn-primary btn-lg">Download PDF</a>
    @endif
   
    </div>
 </div>

@endsection

