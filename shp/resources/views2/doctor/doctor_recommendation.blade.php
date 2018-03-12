@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    <h1>Vision assessment</h1>

                    {!! Form::open(['role' => 'form', 'url' => 'doctor-recommendation' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
           <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />        	
       
					<h4>Diet & Nutrition</h4>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Subject</label>
                                <div class="col-sm-9">
					{!! Form::text('diet_subject', null, ['placeholder' => 'Subject', 'id'=>'diet_subject' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Recommendation</label>
                                <div class="col-sm-9">
					{!! Form::textarea('diet_recommendation', null, array('placeholder'=>'Recommendation', 'id'=>"diet_recommendation",'class'=>'form-control reqiured'), ['size' => '25x4']) !!}
                                </div>
					</div>
					<h4>Mental Health</h4>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Subject</label>
                                <div class="col-sm-9">
					{!! Form::text('mental_subject', null, ['placeholder' => 'Subject', 'id'=>'mental_subject' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Recommendation</label>
                                <div class="col-sm-9">
					{!! Form::textarea('mental_recommendation', null, array('placeholder'=>'Recommendation', 'id'=>"mental_recommendation",'class'=>'form-control reqiured'), ['size' => '25x4']) !!}
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

