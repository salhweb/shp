@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
				<h1>Assessment for sports fitness</h1>
                	<div class="col-sm-offset-1 col-md-9">
                   <h1>Sports Fitness assessment</h1>

                    {!! Form::open(['role' => 'form', 'url' => 'student-sports-fitness-assessment' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />        	
        	
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Outcome of ECG</label>
                                <div class="col-sm-9">
					{!! Form::text('outcome_of_ecg', null, ['placeholder' => 'Outcome of ECG', 'id'=>'outcome_of_ecg' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                            </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Outcome of general assessment</label>
                                <div class="col-sm-9">
					{!! Form::text('general_assessment', null, ['placeholder' => 'Outcome of general assessment', 'id'=>'general_assessment' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Outcome from Growth assessment</label>
                                <div class="col-sm-9">
					{!! Form::text('growth_assessment', null, ['placeholder' => 'Outcome from Growth assessment', 'id'=>'growth_assessment' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">BP Status</label>
                                <div class="col-sm-9">
					{!! Form::text('bp_status', null, ['placeholder' => 'BP Status', 'id'=>'bp_status','class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Oxygen saturation Level</label>
                                <div class="col-sm-9">
					{!! Form::text('oxygen_saturation_level', null, ['placeholder' => 'Oxygen Saturation Level', 'id'=>'oxygen_saturation_level', 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
				 <div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student have flat foot</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('flat_foot', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('flat_foot', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					 
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Left foot Impression</label>
                                <div class="col-sm-9">
					{!! Form::input('number','left_foot', null, ['placeholder' => 'Left foot Impression', 'id'=>'left_foot' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Right foot Impression</label>
                                <div class="col-sm-9">
					{!! Form::input('number','right_foot', null, ['placeholder' => 'Right foot Impression', 'id'=>'right_foot' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                     </div>
					 
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Haemoglobin Level</label>
                                <div class="col-sm-9">
					{!! Form::input('number','haemoglobin_level', null, ['placeholder' => 'Haemoglobin Level', 'id'=>'haemoglobin_level' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
								</div> 
								<div class="form-group">
                            	<label class="col-sm-3 control-label">Doctor’s Opinion</label>
                                <div class="col-sm-9">
					{!! Form::textarea('doctor_opinion', null, ['placeholder' => 'Doctor’s Opinion', 'id'=>'doctor_opinion' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
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

