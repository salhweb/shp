@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                      <h1>General Assessment</h1>
                    {!! Form::open(['role' => 'form', 'url' => 'student-general-assessment' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
             <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">How is the growth of the student</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('student_growth', null, ['placeholder'=>'Student Growth','class' =>'form-control reqiured', 'id'=>'student_growth']) !!}                                	
								</div>
					</div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student suffer from tonsillitis</label>
                              			 <div class="col-sm-9"> 
											<div class="col-sm-4">
												<label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
										 
								{!! Form::radio('tonsillitis', 'yes',false,['class' =>'form-control reqiured']) !!}
								 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('tonsillitis', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                               
                                		</div>
                                </div>
                    </div>

					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student suffering from Hydrocele</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('hydrocele', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('hydrocele', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is there need to consult the dietician</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('consult_dietician', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('consult_dietician', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
                            			 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student suffering from vision problem</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('vision_problem', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('vision_problem', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
                           			 
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there need to consult opthomologist</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('consult_opthomologist', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('consult_opthomologist', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is the student having any hearing problem </label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('hearing_problem', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('hearing_problem', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there need to consult an ENT doctor</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('need_ENT_doctor', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('need_ENT_doctor', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is the student suffering from unattended dental problems</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('unattended_dental_problems', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('unattended_dental_problems', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there a need to consult a dentist</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('consult_dentist', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('consult_dentist', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Does the student suffer from any learning disability</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('learning_disability', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('learning_disability', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there need to consult a speech therapist</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('speech_therapist', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('speech_therapist', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
						
							
					<div class="form-group">
                        <label class="col-sm-3 control-label">Does the student have any skin infection</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('skin_infection', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('skin_infection', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there need to consult Dermatologist</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('consult_dermatologist', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('consult_dermatologist', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">How is the cardiac condition of the student</label>
                            <div class="col-sm-9">
                             	{!! Form::text('cardiac_condition', null, ['placeholder'=>'Cardiac Condition','class' =>'form-control reqiured','id'=>'cardiac_condition']) !!}
										
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there a need to consult Cardiologist</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('consult_cardiologist', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('consult_cardiologist', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there a need for further consultation with a Physician</label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('physician_consultation', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('physician_consultation', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there a need for further consultation with a Clinical psychologist </label>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                               		<label class="col-sm-3 control-label">Yes</label>
                               			<div class="col-sm-9">
											{!! Form::radio('clinical_psychologist_consultation', 'yes', false,['class' =>'form-control reqiured']) !!}
										</div>
								</div>
								<div class="col-sm-4">
                                    <label class="col-sm-3 control-label">No</label>
                              			<div class="col-sm-9">
											{!! Form::radio('clinical_psychologist_consultation', 'no',false,['class' =>'form-control reqiured']) !!}
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

