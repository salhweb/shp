@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    <h1>Hearing assessment</h1>

                    {!! Form::open(['role' => 'form', 'url' => 'student-basic-details' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" /> 

					
					<h2>MEDICAL SNAPSHOT</h2>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Allergies (Dust)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Allergies (Dust)','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Allergies (Cold)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Allergies (Cold)','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					
					
					<h2>Recent Symptoms</h2>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Fatigue</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Fatigue','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Chills</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Chills','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Fever</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Fever','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Night Sweats</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Night Sweats','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Weight Loss / Gain</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Weight Loss / Gain','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Change in Vision (Eyes)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Change in Vision (Eyes)','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
                    
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Sinus Pain (Nose)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Sinus Pain (Nose)','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Difficulty in swallowing</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Difficulty in swallowing','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Tingling (Neurological)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Tingling (Neurological)','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Back Pain (Musco skeletal)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Back Pain (Musco skeletal)','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					
					
					<h2>RISK FACTORS</h2>
					<div class="form-group">
                    <label class="col-sm-3 control-label"> Well Being</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_well_being" name="risk_factors_well_being">
                                     <option value="">Select Value</option>   
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					<h2>RISK FACTORS</h2>
					<div class="form-group">
                    <label class="col-sm-3 control-label">Tobacco</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      
                     				<select class="form-control" id="risk_factors_tobacco" name="risk_factors_tobacco">
                                     <option value="">Select Value</option>   
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
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
					
                     						<option value="high">High</option>
											<option value="midiam">Midiam</option>
											<option value="low">Low</option>
											
                                    
                                       
                                         </select>

                    </div>
					</div>
                    </div>
					
					
					<h2>IMPORTANT INFO</h2>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Membership Type:</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Membership Type','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Primary Clinic</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Primary Clinic','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Primary Doctor:</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Primary Doctor','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Last Visit:</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', null, ['placeholder'=>'Last Visit','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
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

