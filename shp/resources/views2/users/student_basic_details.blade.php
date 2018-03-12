@extends('layouts.main')
@section('content')
<style>
h2 { color:#fff;}
</style>
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    <h1>Student Basic checkup Details <span class="pull-right"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Update Student Basic Detail
</button></span></h1>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:#43c5b8;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Student Basic Checkup Details</h4>
      </div>
      <div class="modal-body">
                    {!! Form::open(['role' => 'form', 'url' => 'users/'.$user_detail[0]->user_id.'/basic-health-detail' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" /> 

					
                   
                    
					<h2>MEDICAL SNAPSHOT</h2>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Blood Group  </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('b_grp', null, ['placeholder'=>'Blood Group','class' =>'form-control reqiured', 'id'=>'b_grp']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Height  </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('height', null, ['placeholder'=>'Height in Cm ','class' =>'form-control reqiured', 'id'=>'height']) !!}                                	
								</div>
					</div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Weight </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('weight', null, ['placeholder'=>'Weight in Kg','class' =>'form-control reqiured', 'id'=>'weight']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Allergies </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('medical_snapshot_allergies', null, ['placeholder'=>'Allergies comma separated','class' =>'form-control reqiured', 'id'=>'medical_snapshot_allergies']) !!}                                	
								</div>
					</div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Allergies-2 </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('m_s_allergies_2', null, ['placeholder'=>'Allergies-2 comma separated','class' =>'form-control reqiured', 'id'=>'m_s_allergies_3']) !!}                                	
								</div>
					</div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Allergies-3 </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('m_s_allergies_3', null, ['placeholder'=>'Allergies-3 comma separated','class' =>'form-control reqiured', 'id'=>'m_s_allergies_3']) !!}                                	
								</div>
					</div>
					
					
					
					<h2>Recent Symptoms</h2>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('recent_symptoms', null, ['placeholder'=>'Recent symptoms comma separated','class' =>'form-control reqiured', 'id'=>'recent_symptoms_fatigue']) !!}                                	
								</div>
					</div>
					
				
					
					
					<h2>RISK FACTORS</h2>
					<div class="form-group">
                    <label class="col-sm-3 control-label"> Well Being</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_well_being" name="risk_factors_well_being">
                                     <option value="">Select Value</option>   
					
                     						<option value="Good">Good</option>
											<option value="Normal">Normal</option>
											<option value="Poor">Poor</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					<div class="form-group">
                    <label class="col-sm-3 control-label"> Sleep</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_sleep" name="risk_factors_sleep">
                                     <option value="">Select Value</option>   
					
                     						<option value="Good">Good</option>
											<option value="Normal">Normal</option>
											<option value="Poor">Poor</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
				
					<div class="form-group">
                    <label class="col-sm-3 control-label"> Physical Fitness</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_physical_fitness" name="risk_factors_physical_fitness">
                                     <option value="">Select Value</option>   
					
                     						<option value="Good">Good</option>
											<option value="Normal">Normal</option>
											<option value="Poor">Poor</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					
					<div class="form-group">
                    <label class="col-sm-3 control-label"> Alcohol</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_alcohol" name="risk_factors_alcohol">
                                     <option value="">Select Value</option>   
					
                     						<option value="Yes">Yes</option>
											<option value="No">No</option>
											
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
				
					<div class="form-group">
                    <label class="col-sm-3 control-label"> Smoking</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_smoking" name="risk_factors_smoking">
                                     <option value="">Select Value</option>   
					
                     						<option value="Yes">Yes</option>
											<option value="No">No</option>
										
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					<div class="form-group">
                    <label class="col-sm-3 control-label">Tobacco</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_tobacco" name="risk_factors_tobacco">
                                     <option value="">Select Value</option>   
					
                     						<option value="Yes">Yes</option>
											<option value="No">No</option>
										
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					
					<div class="form-group">
                    <label class="col-sm-3 control-label"> Occupational Risk</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_occupational_risk" name="risk_factors_occupational_risk">
                                     <option value="">Select Value</option>   
					
                     						<option value="High">High</option>
											<option value="Medium">Medium</option>
											<option value="Low">Low</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
	
					<div class="form-group">
                    <label class="col-sm-3 control-label"> Respiratory Health</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_respiratory_health" name="risk_factors_respiratory_health">
                                     <option value="">Select Value</option>   
					
                     						<option value="Good">Good</option>
											<option value="Normal">Normal</option>
											<option value="Poor">Poor</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					
					<div class="form-group">
                    <label class="col-sm-3 control-label"> Digestive Health</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_digestive_health" name="risk_factors_digestive_health">
                                     <option value="">Select Value</option>   
					
                     						<option value="Good">Good</option>
											<option value="Normal">Normal</option>
											<option value="Poor">Poor</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					<div class="form-group">
                    <label class="col-sm-3 control-label">Muscoskeletal</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_muscoskeletal" name="risk_factors_muscoskeletal">
                                     <option value="">Select Value</option>   
					
                     						<option value="Good">Good</option>
											<option value="Normal">Normal</option>
											<option value="Poor">Poor</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					<div class="form-group">
                    <label class="col-sm-3 control-label">Heart Health</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_heart_health" name="risk_factors_heart_health">
                                     <option value="">Select Value</option>   
					
                     						<option value="Good">Good</option>
											<option value="Normal">Normal</option>
											<option value="Poor">Poor</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					<div class="form-group">
                    <label class="col-sm-3 control-label">Diabetes</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_diabetes" name="risk_factors_diabetes">
                                     <option value="">Select Value</option>   
					
                     						<option value="Type-I">Type-I</option>
											<option value="Type-II">Type-II</option>
											<option value="No">No</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					
					<h2>IMPORTANT INFO</h2>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Membership Type:</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('important_info_membership_type', null, ['placeholder'=>'Membership Type','class' =>'form-control reqiured', 'id'=>'important_info_membership_type']) !!}                                	
								</div>
					</div>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Primary Clinic</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('important_info_primary_clinic', null, ['placeholder'=>'Primary Clinic','class' =>'form-control reqiured', 'id'=>'important_info_primary_clinic']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Primary Doctor:</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('important_info_primary_doctor', null, ['placeholder'=>'Primary Doctor','class' =>'form-control reqiured', 'id'=>'important_info_primary_doctor']) !!}                                	
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
                   <br>
                    <hr style="clear:both;" /> <br>
                    
 <div class="col-md-3">
               <table class="table table-bordered">
                <h3>Health Managment Program</h3>
                <h4>Risk Factors<h4>
		<?php if(count($student_basic_details)>0)
		{ ?>
           <tr>

	
		<td>Well being</td><td><?php echo $student_basic_details[0]->risk_factors_well_being; ?></td>
</tr>
<tr>
		
		<td>Sleep</td><td><?php echo $student_basic_details[0]->risk_factors_sleep; ?></td>
</tr>
<tr>
		<td>Physical Fitness</td><td> <?php echo $student_basic_details[0]->risk_factors_physical_fitness; ?></td>
		
</tr>
<tr>
		<td>Smoking</td><td> <?php echo $student_basic_details[0]->risk_factors_smoking; ?></td>
		
</tr>
<tr>
		<td>Alcohol</td><td> <?php echo $student_basic_details[0]->risk_factors_alcohol; ?></td>
		
</tr>
<tr>
		<td>Tobacco</td><td> <?php echo $student_basic_details[0]->risk_factors_tobacco; ?></td>
		
</tr>
<tr>
		<td>Occupational Risk</td><td> <?php echo $student_basic_details[0]->risk_factors_occupational_risk; ?></td>
		
</tr>
<tr>
		<td>Respiracory Health</td><td> <?php echo $student_basic_details[0]->risk_factors_respiratory_health; ?></td>
		
</tr>
<tr>
		<td>Digestive Health</td><td> <?php echo $student_basic_details[0]->risk_factors_digestive_health; ?></td>
		
</tr>
<tr>
		<td>Musco skeletal</td><td> <?php echo $student_basic_details[0]->risk_factors_muscoskeletal; ?></td>
		
</tr>
<tr>
		<td>Heart Health</td><td> <?php echo $student_basic_details[0]->risk_factors_heart_health; ?></td>
		
</tr>
<tr>
		<td>Diatetes </td><td> <?php echo $student_basic_details[0]->risk_factors_diabetes; ?></td>
		
</tr>
	<?php } ?>
</table>
</div>

<div class="col-md-3">
               <table class="table table-bordered">
                <h3>Medical Snapshort</h3>
                <h4>ALLERGIES</h4>
		<?php if(count($student_basic_details)>0)
		{ ?>
           <tr>

		<td>Allergies:</td><td> <?php echo $student_basic_details[0]->medical_snapshot_allergies; ?></td>
		
</tr>
<tr>
        <td>Allergies 2:</td><td> <?php echo $student_basic_details[0]->m_s_allergies_2; ?></td>
        </tr>
        <tr>
        <td>Allergies 3:</td><td> <?php echo $student_basic_details[0]->m_s_allergies_3; ?></td>
		
</tr>
<?php } ?>
</table>
<table class="table table-bordered">
 <h4>Student Health</h4>
<?php if(count($student_basic_details)>0)
		{ ?>
<tr>
		<td>Blood Group</td><td style="text-transform: capitalize;"><?php echo $student_basic_details[0]->b_grp; ?></td>  
           </tr>
           <tr>
           <td>Height</td><td><?php echo $student_basic_details[0]->height; ?> Cm</td>  
           </tr>
           <tr>
           <td>Weight</td><td><?php echo $student_basic_details[0]->weight; ?> Kg</td>  
           </tr>

	<?php } ?>
</table>
<hr>
</div>

<div class="col-md-3">
<h4>Membership Details<h4>
               <table class="table table-bordered">
                
		<?php if(count($student_basic_details)>0)
		{ ?>
           <tr>

		<td>Membership Type </td><td> <?php echo $student_basic_details[0]->important_info_membership_type; ?></td>
		
</tr>
 <tr>

		<td>Primary Clinic </td><td> <?php echo $student_basic_details[0]->important_info_primary_clinic; ?></td>
		
</tr>
 <tr>

		<td>Primary Doctor</td><td> <?php echo $student_basic_details[0]->important_info_primary_doctor; ?></td>
		
</tr>
 <tr>

		<td>Last Visit</td><td> <?php echo $student_basic_details[0]->checkup_date; ?></td>
		
</tr>

	<?php } ?>
</table>
</div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>


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

