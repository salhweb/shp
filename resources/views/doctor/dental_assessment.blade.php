@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                  <h1>Dental assessment</h1>

                    {!! Form::open(['role' => 'form', 'url' => 'student-dental-assessment' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />        	

                    
                    
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Indicate if cross-bite is correct</label>
                              			 <div class="col-sm-9"> 
											<div class="col-sm-4">
												<label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
										 
								{!! Form::radio('cross_bite_is_correct', 'yes',false,['class' =>'form-control reqiured']) !!}
								 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('cross_bite_is_correct', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                               
                                		</div>
                                </div>
                    </div>

					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the child in the habit of thumb sucking ? </label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('habit_of_thumb_sucking', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('habit_of_thumb_sucking', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the child using dental braises< </label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('dental_braises', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('dental_braises', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the child need Dental alignment corrections</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('dental_alignment_corrections', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('dental_alignment_corrections', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Indications to be checked by the dentist</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('checked_by_the_dentist', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('checked_by_the_dentist', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                  </div>
							    </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Mouth Hygiene </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('mouth_hygiene', null, ['placeholder'=>'Mouth Hygiene','class' =>'form-control reqiured', 'id'=>'mouth_hygiene']) !!}                                	
								</div>
					</div>
				<div class="form-group">
                            	<label class="col-sm-3 control-label">Condition of Gum </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('condition_of_gum', null, ['placeholder'=>'Condition of Gum','class' =>'form-control reqiured', 'id'=>'condition_of_gum']) !!}                                	
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

