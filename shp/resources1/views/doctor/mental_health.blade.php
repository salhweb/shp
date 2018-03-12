@extends('layouts.main')
@section('content')
   <script type='text/javascript'>
$(document).ready(function(){


	$('#add-user').click(function(event){
		
		wholeformcheck();
		event.preventDefault();
	});
	$('#user_roles li a').click(function(){ 
	     var id = $(this).attr('id');
		 var user_role =  $(this).text();  
		$('#user_role').val(id);
		
		if(id == 4) //when school selected
		{
			$('#show_doctors').removeClass('hide'); 
		}
		else
		{
			$('#show_doctors').addClass('hide');
		}
		if(id == 3) //when doctor selected  
		{
		
			$('#show_doctors_types').removeClass('hide');
			
		}
		else
		{
			$('#show_doctors_types').addClass('hide');
			
		}
	});
	$('.feedback_form').click(function(event){
		$('#feedback_type').val($(this).attr('id'));
		$("#create-user").submit();
	});
    $('#multiple-selected').multiselect();

});

function wholeformcheck() { 
   var isFormValid = true;
  
			 var fields = $("#create-user")
			.find('.reqiured, #user_role' ).serializeArray();
	
  $.each(fields, function(i, field) {
  	if (!field.value) {
			if(field.name =='user_role')
			{
				$( "#user_role_dropdown" ).addClass('error');
			}
			else
			{
				$( "input[name='"+field.name+"']" ).addClass('error');
			}
   			
		
		isFormValid = false;
	}
	else
	{
			if(field.name =='user_role')
			{
				$( "#user_role_dropdown" ).removeClass('error');
			}
			else
			{
			$( "input[name='"+field.name+"']" ).removeClass('error');
			}
		
	}
   }); 
	if($("input[name='password']").val()!='' &&  $("input[name='password_confirmation']").val()!='' && ($("input[name='password']").val()!=$("input[name='password_confirmation']").val()))
	{
		alert('Password does not matches');
		isFormValid = false;
	}
	 if (isFormValid) {  $("#create-user").submit();}
	 else{}
	return false;	
}
</script>
   <div class="content">
    	<div class="container">
            <div class="task-form">
              @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                                	<div class="col-sm-offset-1 col-md-9">

        <div class="col-sm-3" >
        <a class="feedback_form btn btn-primary" href="javascript:void(0);" id="medical_detail">
        Medical History
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="javascript:void(0);" id="physical_fitness">
        Physical Fitness
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary activeform" href="javascript:void(0);" id="mental_health">
        Mental Health
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="javascript:void(0);" id="diet_nutrition">
        Diet Nutrition
        </a>
        </div>
                <br /><br /><br /> <br /><br />
              @if(!isset($user_detail[0]))
                No detail found.
                
                    {!! Form::open(['role' => 'form', 'url' => 'student-health-medical-detail' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}
                     {!! Form::hidden('feedback_type', null,array('id'=>"feedback_type" , 'class'=>"form-control" )) !!}
                     {!! Form::hidden('student_name', $student_id,array('id'=>"student_name" , 'class'=>"form-control" )) !!}

					{!! Form::close() !!}
            @else
                
                            {!! Form::open(['role' => 'form', 'url' => 'student-health-medical-detail' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <input type="hidden" name="feedback_type" value="mental_health">      
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Size of the Family</label>
                                <div class="col-sm-9">
					{!! Form::text('family_size', $user_detail[0]->family_size, ['class' => 'form-control reqiured','id'=>'family_size']) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Position of the family</label>
                                <div class="col-sm-9">
					{!! Form::text('family_position', $user_detail[0]->family_position, ['class' => 'form-control reqiured','id'=>'family_position']) !!}
                                </div>
                    </div> 	
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Accommodation Rental/Owned</label>
                                <div class="col-sm-9">
					{!! Form::text('accommodation', $user_detail[0]->accommodation, ['class' => 'form-control reqiured','id'=>'accommodation']) !!}
                                </div>
                    </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">No. of rooms</label>
                                <div class="col-sm-9">
					{!! Form::text('rooms', $user_detail[0]->rooms, ['class' => 'form-control reqiured','id'=>'rooms']) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Facility for study at home</label>
                                <div class="col-sm-9">
					{!! Form::text('study_facility', $user_detail[0]->study_facility, ['class' => 'form-control reqiured','id'=>'study_facility']) !!}
                                </div>
                    </div> 	
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Pupil lives with both the parents</label>
                                <div class="col-sm-9">
					{!! Form::text('lives_with', $user_detail[0]->lives_with, ['class' => 'form-control reqiured','id'=>'lives_with']) !!}
                                </div>
                    </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Type of family</label>
                                <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->family_type, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                                
                                </div>
                  
                   
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Behavior with parents</label>
                               
                                  <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->behavior_with_parents, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                                
                    </div>
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Behavior with peer group</label>
                               
                                  <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->behavior_with_peer_group, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                                
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Leadership</label>
                               
                                  <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->leadership, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                             
                    </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Sociability</label>
                             
                                
                                  <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->sociability, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Initiative</label>
                              
                                    <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->initiative, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Behavior with teacher</label>
                                    <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->behavior_with_teacher, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Personality</label>
                                   <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->personality, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Attendance</label>
                             
                                 <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->attendance, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Obedience</label>
                             
                                  <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->obedience, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Responsibility</label>
                                  <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->responsibility, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Industry</label>
                            
                                  <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->industry, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Home Work</label>
                           <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->home_work, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Self Confidence</label>
                           
                                         <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->self_confidence, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                 </div>
                                 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Personal Appearance</label>
                              
                                            <div class="col-sm-9">
                                {!! Form::text('lives_with', $user_detail[0]->personal_appearance, ['readonly'=>'readonly','class' => 'form-control  reqiured','id'=>'lives_with']) !!}
                               	
                                </div>
                    </div>
                    {!! Form::hidden('feedback_type', null,array('id'=>"feedback_type" , 'class'=>"form-control" )) !!}
                    {!! Form::hidden('student_name', $user_detail[0]->student_id,array('id'=>"student_name" , 'class'=>"form-control" )) !!}      
                        {!! Form::close() !!}
                    </div>
                    <!--<div class="btn-group">
    <div class="dropdown dropdown-btn">
        <div class="dropdown-toggle" data-toggle="dropdown">
            <span id="uniqueId">Text1</span><span class="caret"/>
        </div >
        <ul class="dropdown-menu">
            <li><a onclick="javascript:someFunction()">Item1</a></li>
            <li><a onclick="javascript:someFunction()">Item2</a></li>
            <!-- ... -->
       <!-- </ul>
    </div>
    <div class="dropdown dropdown-btn">
        <div class="dropdown-toggle" data-toggle="dropdown">
            <span id="uniqueId2">Text2</span><span class="caret"/>
        </div >
        <ul class="dropdown-menu">
            <li><a onclick="javascript:someOtherFunction()">Item1</a></li>
            <li><a onclick="javascript:someOtherFunction()">Item2</a></li>-->
            <!-- ... -->
        <!--</ul>
    </div>
</div>-->
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endif 
@endsection

