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
         <a class="feedback_form btn btn-primary activeform" href="javascript:void(0);" id="physical_fitness">
        Physical Fitness
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="javascript:void(0);" id="mental_health">
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
               <input type="hidden" name="feedback_type" value="physical_fitness">      
                   
        
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Taking your daily routine into account, how active are you?:</label>
                                <div class="col-sm-9">
                               
					
                               		
                                </div>
                    </div>	
                 
                    
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Do you undertake any  kind of exercise  before school or in the morning ?</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('do_excercise',  $user_detail[0]->do_excercise, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'do_excercise']) !!}
                               		
                                </div>
                    </div>
                   
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">If yes, tick the correct choice </label>
                                <div class="col-sm-9">
                               
					{!! Form::text('excercise_type',  $user_detail[0]->excercise_type, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'excercise_type']) !!}
                               		
                                </div>
                    </div>
                    
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">How many times a week is the above exercise undertaken ?</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('time_of_exercise',  $user_detail[0]->time_of_exercise, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'time_of_exercise']) !!}
                               		
                                </div>
                    </div>
                   
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Do you play a game/sport in school ?</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('play_game_in_school',  $user_detail[0]->play_game_in_school, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'play_game_in_school']) !!}
                               		
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">If yes, which one ?</label>
                                <div class="col-sm-9">
					{!! Form::text('which_game_play_in_school',  $user_detail[0]->which_game_play_in_school, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'which_game_play_in_school']) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">How many times a week?</label>
                                <div class="col-sm-9">
					{!! Form::text('time_of_game_in_school', $user_detail[0]->time_of_game_in_school, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'time_of_game_in_school']) !!}
                                </div>
                    </div> 
                   
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Any outdoor activity undertaken in the evening ?</label>
                                <div class="col-sm-9">
					{!! Form::text('activity_in_evening', $user_detail[0]->activity_in_evening, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'activity_in_evening']) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">If yes, what ?</label>
                                <div class="col-sm-9">
					{!! Form::text('which_activity_in_evening', $user_detail[0]->which_activity_in_evening, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'which_activity_in_evening']) !!}
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Any after dinner activity ?</label>
                                <div class="col-sm-9">
					{!! Form::text('activity_after_dinner', $user_detail[0]->activity_after_dinner, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'activity_after_dinner']) !!}
                                </div>
                    </div>
                    <!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Take a deep breathe. Can you hold your breath for 60 second?</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('hold_breathe', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('hold_breathe', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Take a deep breathe. Can you hold your breath for 60 second?</label>
                                <div class="col-sm-9">
					{!! Form::text('hold_breathe', $user_detail[0]->hold_breathe, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'hold_breathe']) !!}
                                </div>
                    </div>
                    <!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Can you touch your palms to the ground without Bending your Knees.</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('can_touch_palms', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('can_touch_palms', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Can you touch your palms to the ground without Bending your Knees.</label>
                                <div class="col-sm-9">
					{!! Form::text('can_touch_palms', $user_detail[0]->can_touch_palms, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'can_touch_palms']) !!}
                                </div>
                    </div>
                    <div class="form-group">
					 <label class="col-sm-3 control-label">How many sit-ups you can do continuously </label>
					 <div class="col-sm-9">
					{!! Form::input('number','sit_ups',  $user_detail[0]->sit_ups, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'sit_ups']) !!}
                                </div>
					 </div>
                     <div class="form-group">
					 <label class="col-sm-3 control-label">Pinch your flesh of abdomen, below the waist with your fore finger and thumb is it within range of 12-15 mm? Indicate measurements if aware </label>
					 <div class="col-sm-9">
					{!! Form::input('number','abdomen_fat',$user_detail[0]->abdomen_fat, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'abdomen_fat']) !!}
                                </div>
					 </div>                     
                            {!! Form::hidden('feedback_type', null,array('id'=>"feedback_type" , 'class'=>"form-control" )) !!}
                            {!! Form::hidden('student_name',$user_detail[0]->student_id, array('id'=>"student_name" , 'class'=>"form-control" )) !!}
                      
                        {!! Form::close() !!}
                    </div>                              
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

