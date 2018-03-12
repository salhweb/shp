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
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                                	<div class="col-sm-offset-1 col-md-9">

                     <div class="col-sm-3" >
        <a class="feedback_form btn btn-primary activeform" href="javascript:void(0);}" id="medical_detail">
        Medical History
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="javascript:void(0);" id="physical_fitness">
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
             <input type="hidden" name="feedback_type" value="medical_detail">       
					<h4> 1.Has any member of your close family (parents, Grandparents, Siblings)had of the following condition?</h4>
                    <!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Heart attack</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_heart_attack', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_heart_attack', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_heart_attack', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                       <div class="form-group">
                            	<label class="col-sm-3 control-label">Heart attack:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('family_heart_attack',  $user_detail[0]->family_heart_attack, [ 'readonly'=>'readonly','class' => 'form-control reqiured','id'=>'family_heart_attack']) !!}
                               		
                                </div>
                    </div>
                       <div class="form-group">
                            	<label class="col-sm-3 control-label">High Blood Pressure:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('family_high_blood_pressure',  $user_detail[0]->family_high_blood_pressure, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'family_high_blood_pressure']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">High Blood Pressure</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_high_blood_pressure', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_high_blood_pressure', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_high_blood_pressure', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->  <div class="form-group">
                            	<label class="col-sm-3 control-label">Diabetes:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('family_diabetes',  $user_detail[0]->family_diabetes, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'family_diabetes']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Diabetes</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_diabetes', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_diabetes', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_diabetes', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Hyper Cholesterol:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('family_hyper_cholesterol',  $user_detail[0]->family_hyper_cholesterol, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'family_hyper_cholesterol']) !!}
                               		
                                </div>
                    </div>
					 <!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Hyper Cholesterol</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_hyper_cholesterol', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_hyper_cholesterol', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_hyper_cholesterol', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Cancer</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_cancer', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_cancer', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_cancer', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>--><div class="form-group">
                            	<label class="col-sm-3 control-label">Cancer:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('family_cancer',  $user_detail[0]->family_cancer, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'family_cancer']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Obesity / Overweight</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_obesity_overweight', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_obesity_overweight', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_obesity_overweight', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>--><div class="form-group">
                            	<label class="col-sm-3 control-label">Obesity / Overweight:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('family_obesity_overweight',  $user_detail[0]->family_obesity_overweight, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'family_obesity_overweight']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Asthma</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_asthma', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_asthma', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_asthma', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>--> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Asthma:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('family_asthma',  $user_detail[0]->family_asthma, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'family_asthma']) !!}
                               		
                                </div>
                    </div>
					<hr>
						<h4>2.Does your ward have any of the following conditions, please indicate details if aware, along side?</h4>
						 <div class="form-group">
                            	<label class="col-sm-3 control-label">High Blood Pressure:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('ward_high_blood_pressure',  $user_detail[0]->ward_high_blood_pressure, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'ward_high_blood_pressure']) !!}
                               		
                                </div>
                    </div>
						<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">High Blood Pressure</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('ward_high_blood_pressure', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('ward_high_blood_pressure', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('ward_high_blood_pressure', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>--> 
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">High Blood Sugar Random</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('ward_high_blood_sugar_random', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('ward_high_blood_sugar_random', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('ward_high_blood_sugar_random', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>--> 
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">High Blood Sugar Random:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('ward_high_blood_sugar_random',  $user_detail[0]->ward_high_blood_sugar_random, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'ward_high_blood_sugar_random']) !!}
                               		
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Low Hemoglobin (Anemia):</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('ward_low_hemoglobin',  $user_detail[0]->ward_low_hemoglobin, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'ward_low_hemoglobin']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Low Hemoglobin (Anemia)</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('ward_low_hemoglobin', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('ward_low_hemoglobin', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('ward_low_hemoglobin', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Asthma:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('ward_asthma',  $user_detail[0]->ward_asthma, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'ward_asthma']) !!}
                               		
                                </div>
                    </div>
 
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Asthma</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('ward_asthma', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('ward_asthma', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('ward_asthma', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
						<hr>
					<h4>3.Does your ward undergo an Annual Periodic medical check up including Eyes, teeth, Ears, Nose, Throat and Physicians consultation? </h4>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Medical Check Up:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('medical_check_up',  $user_detail[0]->medical_check_up, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'medical_check_up']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Medical Check Up</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('medical_check_up', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('medical_check_up', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('medical_check_up', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
					<hr>
					<h4>4.	Has  your ward had all Vaccinations / immunizations as mentioned : vaccine:</h4>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">BCG  gainst T.B.</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('bcg_gainst_tb', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('bcg_gainst_tb', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">BCG  gainst T.B:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('bcg_gainst_tb',  $user_detail[0]->bcg_gainst_tb, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'bcg_gainst_tb']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Hepatitis ‘B’ Vaccine against Jaundice</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('hepatitis_b_vaccine_against_jaundice', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('hepatitis_b_vaccine_against_jaundice', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Hepatitis ‘B’ Vaccine against Jaundice:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('hepatitis_b_vaccine_against_jaundice',  $user_detail[0]->hepatitis_b_vaccine_against_jaundice, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'hepatitis_b_vaccine_against_jaundice']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Diphlheria , Whooping  cough , Tetanus (DPT)</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('diphlheria_whooping_cough_tetanus', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('diphlheria_whooping_cough_tetanus', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Diphlheria , Whooping  cough , Tetanus (DPT):</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('diphlheria_whooping_cough_tetanus',  $user_detail[0]->diphlheria_whooping_cough_tetanus, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'diphlheria_whooping_cough_tetanus']) !!}
                               		
                                </div>
                    </div>
                    
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Hepatitis ‘A’ Vaccine</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('hepatitis_a_vaccine', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('hepatitis_a_vaccine', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Hepatitis ‘A’ Vaccine:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('hepatitis_a_vaccine',  $user_detail[0]->hepatitis_a_vaccine, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'hepatitis_a_vaccine']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Tetanus (booster) /  DP (booster)</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('tetanus_dp', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('tetanus_dp', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>-->
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Tetanus (booster) /  DP (booster):</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('tetanus_dp',  $user_detail[0]->tetanus_dp, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'tetanus_dp']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Oral polio Vaccine</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('oral_polio_vaccine', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('oral_polio_vaccine', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>-->
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Oral polio Vaccine:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('oral_polio_vaccine',  $user_detail[0]->oral_polio_vaccine, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'oral_polio_vaccine']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Measles, Mumps, Ruebella (MMR)</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('measles_mumps_ruebella', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('measles_mumps_ruebella', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Measles, Mumps, Ruebella (MMR):</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('measles_mumps_ruebella',  $user_detail[0]->measles_mumps_ruebella, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'measles_mumps_ruebella']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Chicken pox</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('chicken_pox', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('chicken_pox', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Chicken pox:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('chicken_pox',  $user_detail[0]->chicken_pox, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'chicken_pox']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Typhoid</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('typhoid', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('typhoid', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>-->
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Typhoid:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('typhoid',  $user_detail[0]->typhoid, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'typhoid']) !!}
                               		
                                </div>
                    </div>
					<hr>
					<h4>5.   Has your ward had any major operation/hospitalization at any time in the past?</h4>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">chronic illness</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('chronic_illness', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('chronic_illness', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('chronic_illness', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">chronic illness:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('chronic_illness',  $user_detail[0]->chronic_illness, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'chronic_illness']) !!}
                               		
                                </div>
                    </div>
					<hr>
					<h4>6.   Is your ward under treatment or medication at present for the following (tick appropriately):<h4>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Cough and Cold</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('cough_and_cold', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('cough_and_cold', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('cough_and_cold', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Cough and Cold:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('cough_and_cold',  $user_detail[0]->cough_and_cold, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'cough_and_cold']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Fever</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('fever', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('fever', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('fever', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Fever:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('fever',  $user_detail[0]->fever, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'fever']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Bronchitis</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('bronchitis', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('bronchitis', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('bronchitis', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Bronchitis:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('bronchitis',  $user_detail[0]->bronchitis, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'bronchitis']) !!}
                               		
                                </div>
                    </div>
					<!--<div class="form-group">
                            	<label class="col-sm-3 control-label">Urinary Track infection</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('urinary_track_infection', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('urinary_track_infection', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('urinary_track_infection', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>-->
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Urinary Track infection:</label>
                                <div class="col-sm-9">
                               
					{!! Form::text('urinary_track_infection',  $user_detail[0]->urinary_track_infection, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'urinary_track_infection']) !!}
                               		
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Other (please specify)</label>
                                <div class="col-sm-9">
					{!! Form::text('other_treatment', $user_detail[0]->other_treatment, [ 'readonly'=>'readonly', 'class' => 'form-control reqiured','id'=>'other (please specify)']) !!}
                                </div>
                    </div> 	
                    <hr>
					<h4>7.   Is your ward allergic to any medicine/food?</h4>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Is your ward allergic to any medicine/food?</label>
                                <div class="col-sm-9">
					{!! Form::textarea('ward_allergic', $user_detail[0]->ward_allergic, [ 'readonly'=>'readonly','class' => 'form-control reqiured','id'=>'ward_allergic']) !!}
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

