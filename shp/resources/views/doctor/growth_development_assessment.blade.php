@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
				  	<div class="col-sm-offset-1 col-md-9">
                    <h1>Growth&Development Assessment</h1>
                    {!! Form::open(['role' => 'form',  'url' => 'student-growth-development-assessment','id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
             <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />        	
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Height(cms)</label>
                                <div class="col-sm-9">
					{!! Form::input('number','height', null, ['placeholder' => 'Height', 'id'=>'height' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                            </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Weight(kgs)</label>
                                <div class="col-sm-9">
					{!! Form::input('number','weight', null, ['placeholder' => 'Weight', 'id'=>'weight' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">BP Sys</label>
                                <div class="col-sm-9">
					{!! Form::input('number','bp_sys', null, ['placeholder' => 'BP Sys', 'id'=>'bp_sys' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Bp Dia</label>
                                <div class="col-sm-9">
					{!! Form::input('number','bp_dia', null, ['placeholder' => 'Bp Dia', 'id'=>'bp_dia' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Pulse</label>
                                <div class="col-sm-9">
					{!! Form::input('number','pulse', null, ['placeholder' => 'Pulse', 'id'=>'pulse' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Lung Capacity (Lt/Min)</label>
                                <div class="col-sm-9">
					{!! Form::input('number','lung_capacity', null, ['placeholder' => 'Lung Capacity (Lt/Min)', 'id'=>'lung_capacity' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Oxygen Saturation (%)</label>
                                <div class="col-sm-9">
					{!! Form::input('number','oxygen_saturation', null, ['placeholder' => 'Oxygen Saturation (%)', 'id'=>'oxygen_saturation' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Jumping Height (cms)</label>
                                <div class="col-sm-9">
					{!! Form::input('number','jumping_height', null, ['placeholder' => 'Jumping Height (cms)', 'id'=>'jumping_height' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
								</div>
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Hopping Distance (cms)</label>
                                <div class="col-sm-9">
					{!! Form::input('number','hopping_distance', null, ['placeholder' => 'Hopping Distance (cms)', 'id'=>'' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>				 
					 
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Can bend back</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('can_bend_back', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('can_bend_back', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Can squat</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('can_squat', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('can_squat', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Spine Shape</label>
                                <div class="col-sm-9">
					{!! Form::text('spine_shape', null, ['class' => 'form-control reqiured','id'=>'spine_shape']) !!}
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Gait</label>
                                <div class="col-sm-9">
					{!! Form::text('gait', null, ['class' => 'form-control reqiured','id'=>'gait']) !!}
                                </div>
                   	</div>
                  <div class="form-group">
                            	<label class="col-sm-3 control-label">Can fold all fingers of the left hand</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('left_hand_fingers_fold', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('left_hand_fingers_fold', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Can fold all fingers of the right hand</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('right_hand_fingers_fold', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('right_hand_fingers_fold', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Can the left hand middle finger touch the shoulder</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('left_hand_middle_finger_touch_the_shoulder', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('left_hand_middle_finger_touch_the_shoulder', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
		
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Can the right hand middle finger touch the shoulder</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('right_hand_middle_finger_touch_the_shoulder', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('right_hand_middle_finger_touch_the_shoulder', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Can the left hand middle finger touch the spine</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('left_hand_middle_finger_touch_the_spine', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('left_hand_middle_finger_touch_the_spine', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Can the right hand middle finger touch the spine</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('right_hand_middle_finger_touch_the_spine', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('right_hand_middle_finger_touch_the_spine', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Has the student suffered from fracture in the current year</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('student_suffered_fracture', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('student_suffered_fracture', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student have post fracture stiffness</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('post_fracture_stiffness', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('post_fracture_stiffness', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student suffer from Knock-Knees</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('suffer_from_knock_knees', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('suffer_from_Knock_Knees', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Overall Health Rank</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">1</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('overall_health_rank', '1', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">2</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('overall_health_rank', '2',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
								  <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">3</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('overall_health_rank', '3',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
								  <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">4</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('overall_health_rank', '4',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
								  <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">5</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('overall_health_rank', '5',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
                           <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Submit" id="add-user" class="btn-orange">
                                </div>
                           </div>   
                        {!! Form::close() !!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script type='text/javascript'>
$(document).ready(function(){
	if($('#student_id').val()=='' || $('#student_id').val()==' ')
	{
		alert('Please select student.');
		window.location.href="student-treatment"; 
		
	}

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
@endsection

