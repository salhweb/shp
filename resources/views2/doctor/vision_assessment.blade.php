@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    <h1>Vision assessment</h1>

                    {!! Form::open(['role' => 'form', 'url' => 'student-vision-assessment' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
           <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />        	
       
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the child suffering from ocular alignment (squint)</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('ocular_alignment', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('ocular_alignment', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								</div>
					</div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the child wearing spectacles or lens</label>
                              			 <div class="col-sm-9"> 
											<div class="col-sm-4">
												<label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
										 
								{!! Form::radio('wearing_spectacles', 'yes',false,['class' =>'form-control reqiured']) !!}
								 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('wearing_spectacles', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                               
                                		</div>
                                </div>
                    </div>

					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is there red or watery crust in the eye</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('crust_in_the_eye', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('crust_in_the_eye', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is there any white pupil</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('white_pupil', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('white_pupil', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
                            			 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the eye wandering</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('eye_wandering', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('eye_wandering', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
                           			 
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is the student rubbing eyes frequently</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('rubbing_eyes', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('rubbing_eyes', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is the student unusually sensitive to bright light</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('bright_light', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('bright_light', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is the student color blind</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('color_blind', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('color_blind', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Does the student suffer from night blindness</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('night_blindness', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('night_blindness', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Does the student suffer from nausea while studying</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('nausea', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('nausea', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Does the student suffer from headache after or while reading</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('suffer_from_headache', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('suffer_from_headache', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is the student thrusting his head forward or backward while looking at distant object</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('thrusting_head', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('thrusting_head', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
						
							
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is the student turning or tilting the head to one side while reading</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('student_turning', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('student_turning', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is the student placing the head close to book while reading</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('head_close_to_book', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('head_close_to_book', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Does the student suffer from blurred vision or double image</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('blurred_vision', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('blurred_vision', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<h4>Visual Acuity</h4>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Left Eye</label>
                                <div class="col-sm-9">
					{!! Form::text('left_eye_acuity', null, ['placeholder' => 'left eye', 'id'=>'left_eye_acuity' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Right Eye</label>
                                <div class="col-sm-9">
					{!! Form::text('right_eye_acuity', null, ['placeholder' => 'righ eye', 'id'=>'right_eye_acuity' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>
					<h4>Refractometer Readings</h4>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Right Spherical</label>
                                <div class="col-sm-9">
					{!! Form::text('right_spherical', null, ['placeholder' => 'Right Spherical', 'id'=>'right_spherical' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Left Spherical</label>
                                <div class="col-sm-9">
					{!! Form::text('left_spherical', null, ['placeholder' => 'Left Spherical', 'id'=>'left_spherical' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Right Cylindrical</label>
                                <div class="col-sm-9">
					{!! Form::text('right_cylindrical', null, ['placeholder' => 'Right Cylindrical', 'id'=>'right_cylindrical' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Left cy</label>
                                <div class="col-sm-9">
					{!! Form::text('left_cylindrical', null, ['placeholder' => 'Left Cylindrical', 'id'=>'left_cylindrical' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Right Axis</label>
                                <div class="col-sm-9">
					{!! Form::text('right_axis', null, ['placeholder' => 'Right Axis', 'id'=>'right_axis' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Left Axis</label>
                                <div class="col-sm-9">
					{!! Form::text('left_axis', null, ['placeholder' => 'Left Axis', 'id'=>'left_axis' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Indication for consultation with an opthomologist </label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('opthomologist_consultation', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('opthomologist_consultation', 'no',false,['class' =>'form-control reqiured']) !!}
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

