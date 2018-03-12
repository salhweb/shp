@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    {!! Form::open(['role' => 'form', 'url' => 'admin/users' ,'id' => 'create-user' ,'class' => 'form-horizontal','files' => true]) !!}

 
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
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">User Type</label>
                                <div class="col-sm-9">
                                	<div class="btn-group btn-group1">
                                     <button class="btn dropdown-toggle" data-toggle="dropdown" id="user_role_dropdown" aria-expanded="true">User Type <b class="caret"></b></button>
                     @if (isset($user_roles))
					 @if (count($user_roles) > 0)
                                         <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu2" role="menu" id="user_roles">
					 @foreach($user_roles as $user_role)
                                           <li><a tabindex="-1" id="{!!$user_role->id!!}" href="javascript:void(0);" > {!! ucfirst($user_role->role) !!}</a></li>
                                         @endforeach
                                         </ul>
					@endif
                    @endif
                                     </div>
                                </div>
                                </div>
                                <div id="show_doctors" class="hide">
                   <?php if (isset($users))
				   		{
					 		if (count($users) > 0)
							{
                     
                     		$nurse_list ='';
							$doctor_list ='';
							$school_list ='';
							$doctor_select_list ='';
					 foreach($users as $user)
					 { if($user->user_role==2) // nurses
					 	{
							$nurse_head ='<div class="form-group">
                            	<label class="col-sm-3 control-label">Nurse</label>
                                <div class="col-sm-9">
                                	<div class="btn-group btn-group1">
                                     <button class="btn dropdown-toggle" data-toggle="dropdown" data-inserted-to="school_nurse" id="user_role_dropdown" aria-expanded="true">Select Nurse <b class="caret"></b></button>
                                         <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu2" role="menu" id="nurses">';
										 $nurse_list .='<li>
                          <a tabindex="-1" id="'.$user->id.'" href="javascript:void(0);">
                          '.$user->name.'
                          </a>
                          </li>';
						  $nurse_bottom ='</ul>
                                         </div>
                                </div>
								</div>';
						}
						elseif($user->user_role==3) // doctors
						{
							
						  $doctor_select_list .='<option value="'.$user->id.'">'.$user->name.'</option>';
						  
						}
						elseif($user->user_role==4) // schools
						{
							
						  $school_head ='<div class="form-group">
                            	<label class="col-sm-3 control-label">School</label>
                                <div class="col-sm-9">
                                	<div class="btn-group btn-group1">
                                     <button class="btn dropdown-toggle" data-toggle="dropdown" data-inserted-to="school" id="" aria-expanded="true">Select School <b class="caret"></b></button>
                                         <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu2" role="menu" id="schools">';
										 $school_list .='<li>
                          <a tabindex="-1" id="'.$user->id.'" href="javascript:void(0);">
                          '.$user->name.'
                          </a>
                          </li>';
						  $school_bottom ='</ul>
                                         </div>
                                </div>
								</div>';
						  
						}
					 }
							}
						}
						?>
                    @if(isset($nurse_head))   
					{!! $nurse_head !!} {!! $nurse_list !!} {!! $nurse_bottom !!}
                    @endif
                    <span class="hide-native-select">
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Doctor</label>
                                <div class="col-sm-9">
                  <select id="multiple-selected" multiple="multiple" name="doctors[]">
                    @if(isset($doctor_select_list))   {!! $doctor_select_list !!} @endif
                   </select>  
                   </div>
                   </div>
                   
                    </div>
                                  <div id="show_doctors_types" class="hide">
                   @if (isset($doctor_types))
					 @if (count($doctor_types) > 0)
                     					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Doctor Type</label>
                                <div class="col-sm-9">
                                	<div class="btn-group btn-group1">
                                     <button class="btn dropdown-toggle" data-toggle="dropdown"  data-inserted-to="doctor_type" id="doctor_types_dropdown" aria-expanded="true">Doctor Type <b class="caret"></b></button>
                                         <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu2" role="menu" id="doctor_types">
					 @foreach($doctor_types as $doctor_type)
                          <li>
                          <a tabindex="-1" id="{!!$doctor_type->id!!}" href="javascript:void(0);">
                          {!!ucfirst($doctor_type->type)!!}
                          </a>
                          </li>
                                         @endforeach
                                         </ul>
                                         </div>
                                </div>
					@endif
                    @endif
                    </div>
                   
				{!! Form::hidden('user_role', null,array('id'=>"user_role" , 'class'=>"form-control" )) !!}
                {!! Form::hidden('doctor_type', null,array('id'=>"doctor_type" , 'class'=>"form-control" )) !!}   
                {!! Form::hidden('school_doctor', null,array('id'=>"school_doctor" , 'class'=>"form-control" )) !!}
                {!! Form::hidden('school_nurse', null,array('id'=>"school_nurse" , 'class'=>"form-control" )) !!}
                {!! Form::hidden('school', null,array('id'=>"school" , 'class'=>"form-control" )) !!}

                
                           </div>
                            <div id="for_student" class="hide">
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
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Male</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('gender', 'male', false,['class' =>'form-control']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">Female</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('gender', 'female',false,['class' =>'form-control']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                        <div class="form-group">
                            	<label class="col-sm-3 control-label">Class</label>
                                <div class="col-sm-9">
                                	<div class="btn-group btn-group1">
                                     <button class="btn dropdown-toggle" data-toggle="dropdown" id="class_dropdown" aria-expanded="true">Class<b class="caret"></b></button>
                     @if (isset($classes))
					 @if (count($classes) > 0)
                                         <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu2" role="menu" id="classes">
					 @foreach($classes as $class)
                                           <li><a tabindex="-1" id="{!!$class->id!!}" href="javascript:void(0);" > {!! ucfirst($class->class_name) !!}</a></li>
                                         @endforeach
                                         </ul>
					@endif
                    @endif
                                     </div>
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
                   	{!! Form::textarea('address', null, array('placeholder'=>'address', 'id'=>"address",'class'=>'form-control'), ['size' => '25x4']) !!}
                    </div>
                    </div>
                {!! Form::hidden('school_id',null,array('id'=>"school_id" , 'class'=>"form-control" )) !!}    
                 {!! Form::hidden('class_id', null,array('id'=>"class_id" , 'class'=>"form-control" )) !!}    
                    </div>
                                               <div class="well">
                           	<label>Attach files</label>
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

