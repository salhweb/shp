@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    {!! Form::open(['role' => 'form', 'url' => 'users/'.$user_detail[0]->user_id.'/checkup' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    	
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Student Name</label>
                                <div class="col-sm-9">
					{!! Form::text('username', $user_detail[0]->name, ['placeholder' => 'Username', 'id'=>'user-name' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required', 'readonly'=>'readonly']) !!}
                                </div>
                            </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Father Name</label>
                                <div class="col-sm-9">
					{!! Form::text('father_name', $user_detail[0]->father_name, ['placeholder' => 'Father Name', 'class' => 'form-control reqiured', 'readonly'=>'readonly']) !!}
                                </div>
                    </div>
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Time In</label>
                                <div class="col-sm-9">
                                <?php $time_in =date('H:i:s'); ?>
					 {!! Form::text('time_in', $time_in, ['placeholder' => 'Time In', 'class' => 'form-control reqiured', 'readonly'=>'readonly']) !!}
                                </div>
                            </div>
 						 <div class="form-group">
                            	<label class="col-sm-3 control-label">Student Problem</label>
                                <div class="col-sm-9">
                   	{!! Form::textarea('student_problem', null, array('placeholder'=>'Student Problem', 'id'=>"student_problem",'class'=>'form-control reqiured'), ['size' => '25x4']) !!}
                    </div>
                    </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Nurse Suggestion</label>
                                <div class="col-sm-9">
                   	{!! Form::textarea('nurse_suggestion', null, array('placeholder'=>'Nurse Suggestion', 'id'=>"address",'class'=>'form-control reqiured'), ['size' => '25x4']) !!}
                    </div>
                    </div>
    
    <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Update Checkup" id="add-user" class="btn-orange">
                                </div>
                           </div> 
 
    {!! Form::close() !!}
 <hr />
 <h2>Previous Checkups</h2>
 @if(isset($checkup_details))
 	@if(count($checkup_details)>0)
    <table class="table">
    <tr>
    	<th width=35%>Student Problem</th>
        <th width=35%>Nurse Suggestion</th>
        <th width=8%>Time In</th>
        <th width=10%>Time Out</th>
        <th width=12%>Date</th>
    </tr>
    @foreach($checkup_details as $checkup_detail)
    <tr>
    	<td>{!! $checkup_detail->student_problem !!}</td>
        <td>{!! $checkup_detail->nurse_suggestion !!}</td>
        <td>{!! $checkup_detail->time_in !!}</td>
        <td>{!! $checkup_detail->time_out !!}</td>
		<td>{!! $checkup_detail->checkup_date !!}</td>
    </tr>
    @endforeach
    </table>
    @else
    <h4>No previous checkups</h4>
    @endif
    @else
    <h4>No previous checkups</h4>
 @endif
</div>
@endsection
