@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
              @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
 @if (Session::has('student_detail'))

@endif
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    {!! Form::open(['role' => 'form', 'url' => 'student-assessment' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Select School
</label>
                              			 <div class="col-sm-9"> 
                     <div class="btn-group btn-group1" style="margin-right:20px;">
                    
                      @if (isset($schools))
					 @if (count($schools) > 0)
                     				<select class="form-control" id="school_id" name="school_id">
                                     <option value="">Select School</option>   
					 @foreach($schools as $school)
                     						<option value="{!!$school->school_id!!}" @if (Session::has('student_detail') && (Session::get('student_detail.school_id') == $school->school_id)) selected @endif >{!! ucfirst($school->school_name) !!}</option>
                                    
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
                     		    <option value="{!!$class->id!!}" @if (Session::has('student_detail') && (Session::get('student_detail.class_id') == $class->id)) selected @endif >{!! ucfirst($class->class_name) !!}</option>
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
                     		  <option value="{!!$section->id!!}" @if (Session::has('student_detail') && (Session::get('student_detail.section_id') == $section->id)) selected @endif >{!! ucfirst($section->section_name) !!}</option>
                    @endforeach
                        </select>
					@endif
                    @endif
                    </div>
					</div>
                    </div>
					@if (Session::has('student_detail'))
						<?php // echo'<pre>'; print_r($_SESSION[]); echo'</pre>'; ?>
						
					@endif
                    <div class="form-group student_select  @if (Session::has('student_detail') && Session::get('student_detail.student_name') != '') @else hide @endif">
                      <label class="col-sm-3 control-label">Student</label>
                              			 <div class="col-sm-9"> 
					<input type="text" name="select_student" value="@if (Session::has('student_detail') && Session::get('student_detail.student_name') != ''){{ Session::get('student_detail.student_name')}}@endif " placeholder="Student Name" id="select_student"  class="form-control required auto-suggest" >
				<input type="hidden" name="student_name' value=" @if (Session::has('student_detail') && Session::get('student_detail.student_id') != ''){{ Session::get('student_detail.student_id') }} @endif " id="student_name"  class="form-control">
                                </div>
                                </div>
         <div class="  @if (Session::has('student_detail') && Session::get('student_detail.student_id') != '') Session::get('student_detail.student_id') @else hide @endif " id="student_feedback">
      
          <div class="col-sm-4" >
        <a class="assessment_form btn btn-primary" href="javascript:void(0);" data-href="{{url('student-general-assessment')}}" id="general_assessment">
        General Assessment
        </a>
        </div>
          <div class="col-sm-4" >
         <a class="assessment_form btn btn-primary" href="javascript:void(0);" data-href="{{url('student-vision-assessment')}}" id="vision_assessment">
       Vision Assessment
        </a>
        </div>
        <div class="col-sm-4" >
         <a class="assessment_form btn btn-primary " href="javascript:void(0);" data-href="{{url('student-hearing-assessment')}}" id="hearing_assessment">
        Hearing Assessment
        </a>
        </div>

     <span class="break"></span>
         <br  />
		 <div class="col-sm-4" >
         <a class="assessment_form btn btn-primary" href="javascript:void(0);" data-href="{{url('student-sports-fitness-assessment')}}" id="sports_fitness_assessment">
       Sports Fitness Assessment
        </a>
        </div>    
                 <div class="col-sm-3" >
         <a class="assessment_form btn btn-primary " href="javascript:void(0);" data-href="{{url('student-dental-assessment')}}" id="learning_disability_assessment">
        Dental Assessment
        </a>
        </div>
         <div class="col-sm-4 pull-right" >
         <a class="assessment_form btn btn-primary " href="javascript:void(0);" data-href="{{url('student-learning-disability-assessment')}}" id="learning_disability_assessment">
        Learning Disability Assessment
        </a>
        </div>
         <span class="break"></span>
         <br  />
          <div class="col-sm-5" >
         <a class="assessment_form btn btn-primary" href="javascript:void(0);" data-href="{{url('student-growth-development-assessment')}}" id="growth_development_assessment">
       Growth Development Assessment
        </a>
        </div>
        <div class="col-sm-5" >
         <a class="assessment_form btn btn-primary" href="javascript:void(0);" data-href="{{url('doctor-recommendation')}}" id="doctor_recommendation">
       Diet & Nutrition & Mental Health Recommendations
        </a>
        </div>
        </div>      
          				{!! Form::hidden('assesment_type', null,array('id'=>"assesment_type" , 'class'=>"form-control" )) !!}
          
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

	$('.assessment_form').click(function(event){
		var href = $(this).attr('data-href');
		var student_id =  $('#student_name').val();
		window.location.href = href+'?student_id='+student_id;
                 //   window.open(  href+'?student_id='+student_id,  '_blank' ); //
		
		//$("#create-user").submit();
	});
	
	$('#add-user').click(function(event){
		
		wholeformcheck();
		event.preventDefault();
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

