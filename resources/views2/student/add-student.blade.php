@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
        @if (Session::has('message'))
    <div class="alert alert-info  alert-dismissable">
     		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{!! Session::get('message') !!}
	</div>
@endif
	
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert  alert-dismissable'>
     		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {!! $error !!}
             </div>
        @endforeach
    @endif
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    {!! Form::open(['role' => 'form', 'url' => 'add-student' ,'id' => 'create-user' ,'class' => 'form-horizontal','files' => true]) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    	
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Full Name</label>
                                <div class="col-sm-9">
					{!! Form::text('username', null, ['placeholder' => 'Full Name', 'id'=>'user-name' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                            </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
					{!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control reqiured']) !!}
                                </div>
                    </div>
                                       <div class="form-group">
                            	<label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
					 {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control reqiured']) !!}
                                </div>
                            </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-9">
					{!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control reqiured']) !!}
                                </div>
                    </div>

                            <div id="for_student" >
                             @if(isset($school_head))   
					{!! $school_head !!} {!! $school_list !!} {!! $school_bottom !!}
                    @endif
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Birth date</label>
                                <div class="col-sm-9">
                                	{!! Form::input('date', 'birth_date', null,array('placeholder'=>'Birth date', 'id'=>"birth_date" , 'class'=>"form-control" )) !!}
                                </div>
                            </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Gender</label>
                                <div class="col-md-9 col-sm-12 col-xs-12">
                          <select class="form-control required" name="gender" >
						 <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        </select>
                        </div>
                        </div>
                        <div class="form-group ">
                            	<label class="col-sm-3 control-label">Class</label>
                                <div class="col-sm-9">
                       @if (isset($classes))
					 @if (count($classes) > 0)
                                        <select class="form-control required" name="class_id" > 
                                        <option value="">Select Class</option>
					 @foreach($classes as $class)
                                           <option value="{!!$class->id!!}" > {!! ucfirst($class->class_name) !!}
                                           </option>
                                         @endforeach
                                         </select>
					@endif
                    @endif
                                </div>
                                </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Section</label>
                                <div class="col-sm-9">
                                	
                                     <select class="form-control" id="section_id" name="section_id" >
                                     <option>Select Section </option>
                     @if (isset($sections))
					 @if (count($sections) > 0)
                                        
					 @foreach($sections as $section)
                     <option id="{!!$section->id!!}" value="{!!$section->id!!}" >{!!$section->section_name!!} </option>
                                         @endforeach
                                        
					@endif
                    @endif
                                </select>      
                                </div>
                                </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Roll No</label>
                                <div class="col-sm-9">
					{!! Form::text('roll_number', null, ['placeholder'=>'Roll No','class' => 'form-control']) !!}
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Father Name</label>
                                <div class="col-sm-9">
					{!! Form::text('father_name', null, ['placeholder'=>'Father Name','class' => 'form-control']) !!}
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Mother Name</label>
                                <div class="col-sm-9">
					{!! Form::text('mother_name', null, ['placeholder'=>'Mother Name','class' => 'form-control']) !!}
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Phone no</label>
                                <div class="col-sm-9">
					{!! Form::input('tel','phone_no', null, ['placeholder'=>'Phone no','class' => 'form-control']) !!}
                                </div>
                    </div>
                    
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                   	{!! Form::text('address', null, array('placeholder'=>'address', 'id'=>"address",'class'=>'form-control'), ['size' => '25x4']) !!}
                    </div>
                    </div>
                {!! Form::hidden('school_id',null,array('id'=>"school_id" , 'class'=>"form-control" )) !!}    
                 {!! Form::hidden('class_id', null,array('id'=>"class_id" , 'class'=>"form-control" )) !!}    
                    </div>
                                               <div class="well">
                           	<label>Profile Picture</label>
                            	<div class="row">                               	
                                    
                                </div>
			{!! Form::file('userpic',array('class'=>'form-control')) !!}
                           </div>
                           <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Add User" id="add-user" class="btn-orange">
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


	$('#add-user').click(function(event){
		
		wholeformcheck();
		event.preventDefault();
	});
	
	$('#classes li a').click(function(){ 
	     var id = $(this).attr('id');
		 
		$('#class_id').val(id);
		
		
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
		if(id == 5) //when student selected  
		{
		
			$('#for_student').removeClass('hide');
			
		}
		else
		{
			$('#for_student').addClass('hide');
			
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

