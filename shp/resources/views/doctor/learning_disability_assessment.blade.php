@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
				<h1>Learning Disability assessment</h1>
                	<div class="col-sm-offset-1 col-md-9">
                    {!! Form::open(['role' => 'form', 'url' => 'student-learning-disability-assessment' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
             <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />        	
       	
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Activity status of the child</label>
                                <div class="col-sm-9">
					{!! Form::text('activity_status', null, ['placeholder' => 'Activity Status', 'id'=>'activity_status' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                            </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student stammer</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('student_stammer', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('student_stammer', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student positive for Dyslexia</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('dyslexia', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('dyslexia', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                  <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student positive for Dyspraxia</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('dyspraxia', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('dyspraxia', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student positive for Dyscalculia</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('dyscalculia', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('dyscalculia', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student positive for ADD</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('positive_for_ADD', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('positive_for_ADD', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>									
							<div class="form-group">
                            	<label class="col-sm-3 control-label">Indication for Consultation with a speech therapist</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('speech_therapist', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('speech_therapist', 'no',false,['class' =>'form-control reqiured']) !!}
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

