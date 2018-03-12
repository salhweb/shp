@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    {!! Form::open(['role' => 'form', 'url' => 'student-health-medical-detail' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Select School</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      @if (isset($schools))
					 @if (count($schools) > 0)
                     				<select class="form-control" id="school_id" name="school_id">
                                     <option value="">Select School</option>   
					 @foreach($schools as $school)
                     						<option value="{!!$school->school_id!!}">{!! ucfirst($school->school_name) !!}</option>
                                    
                                         @endforeach
                                         </select>
					@endif
                    @endif
                    </div>
					</div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Select Class</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                      
                      @if (isset($classes))
					 @if (count($classes) > 0)
                         <select class="form-control" id="class_id" name="class_id">
                               <option value="">Select Class</option> 
					 @foreach($classes as $class)
                     		    <option value="{!!$class->id!!}">{!! ucfirst($class->class_name) !!}</option>
                     @endforeach
                        </select>
					@endif
                    @endif
                    </div>
					</div>
                   </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Select Section</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                      @if (isset($sections))
					 @if (count($sections) > 0)
                     	<select class="form-control" id="section_id" name="section_id">
                               <option value="">Select Section</option> 
					 @foreach($sections as $section)
                     		  <option value="{!!$section->id!!}">{!! ucfirst($section->section_name) !!}</option>
                    @endforeach
                        </select>
					@endif
                    @endif
                    </div>
					</div>
                    </div>
                    <div class="form-group student_select hide">
                      <label class="col-sm-3 control-label">Student</label>
                              			 <div class="col-sm-9"> 
					{!! Form::text('select_student', null,array('placeholder'=>'Student Name', 'id'=>"select_student" , 'class'=>"form-control required auto-suggest" )) !!}
				{!! Form::hidden('student_name', null,array('id'=>"student_name" , 'class'=>"form-control" )) !!}
                                </div>
                                </div>
                                <div class="hide" id="student_feedback">
                         <div class="col-sm-3" >
        <a class="feedback_form btn btn-primary" href="javascript:void(0);" id="medical_detail">
        Medical Detail
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="javascript:void(0);" id="physical_fitness">
        Physical Fitness
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary " href="javascript:void(0);" id="mental_health">
        Mental Health
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="javascript:void(0);" id="diet_nutrition">
        Diet Nutrition
        </a>
        </div>   
        </div>      
          				{!! Form::hidden('feedback_type', null,array('id'=>"feedback_type" , 'class'=>"form-control" )) !!}
          
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type='text/javascript'>
$(document).ready(function(){


$( "select" ).change(function() {
  if($('#school_id').val()!='' && $('#class_id').val()!='' &&$('#section_id').val()!='' )
  {
	  $('.student_select').removeClass('hide');
  }
  else
  {
	  $('.student_select').addClass('hide');
  }
  });
    $("#select_student").autocomplete({
		
		minLength:1,
			 autoFocus:true,
        source: function(request, response) {
            $.ajax({
                url: '{{URL('getstudents')}}',
                
                data: {
                    term : request.term,
                    school_id : $("#school_id").val(),
					class_id :  $("#class_id").val(),
					section_id : $("#section_id").val(),
                },
				
                success: function(data) {
					  response( data );
					  $('#student_feedback').addClass('hide');
				}
            });
        },
		select: function(event, ui) { 
	       		 $('#student_name').val(ui.item.value); 
	       		 event.preventDefault(); 
			$("#select_student").val(ui.item.label);
			$('#student_feedback').removeClass('hide'); },
       
    });

	$('#add-user').click(function(event){
		
		wholeformcheck();
		event.preventDefault();
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
			.find('.reqiured' ).serializeArray();
	
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
	
	 if (isFormValid) {  $("#create-user").submit();}
	 else{}
	return false;	
}
</script>
@endsection

