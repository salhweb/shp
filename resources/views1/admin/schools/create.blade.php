@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    {!! Form::open(['role' => 'form', 'url' => 'admin/schools' ,'id' => 'create-user' ,'class' => 'form-horizontal','files' => true]) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    	
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">School Name</label>
                                <div class="col-sm-9">
					{!! Form::text('schoolname', null, ['placeholder' => 'School Name', 'id'=>'user-name' , 'class' => 'form-control reqiured' , 'reqiured'=> 'required']) !!}
                                </div>
                            </div>
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
						elseif($user->user_role==4) // school admin
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
                    
                {!! Form::hidden('school_doctor', null,array('id'=>"school_doctor" , 'class'=>"form-control" )) !!}
                {!! Form::hidden('school_nurse', null,array('id'=>"school_nurse" , 'class'=>"form-control" )) !!}
                
                           
                    <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Add School" id="add-user" class="btn-orange">
                                </div>
                           </div>       
                        {!! Form::close() !!}
                    </div>
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

