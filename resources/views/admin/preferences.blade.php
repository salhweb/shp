@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                     @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
                    <h1>Preferences</h1>
                    {!! Form::open(['role' => 'form', 'url' => 'admin/preferences' ,'id' => 'create-user' ,'class' => 'form-horizontal','files' => true]) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
           
            	@foreach($preferences as $preference)
                	@if($preference->parent_id ==0)
                    <div class="col-md-6 ">
                    <div class="x_panel">
                     <ul id="menu-main-menu" class="main-menu nav side-menu">
                	<li class="parent-menu-li">
                        {!! Form::checkbox('preference_selected[]', $preference->id, null, ['class' => 'parent_menu']) !!} {{ $preference->display_name }}			<ul>
                        @foreach($preferences as $preference1)
                		@if($preference1->parent_id == $preference->id  )
                        <li><label for="{{!!$preference1->id!!}}">
                        {!! Form::checkbox('preference_selected[]', $preference1->id, null, ['class' => 'sub_menu']) !!} {{ $preference1->display_name }}		</label>	</li>
                       
                         @endif
               			 @endforeach
                   </ul>  </li>
                   </ul>
                   </div>
                    </div>	
                    @endif
                @endforeach
            <div class="col-md-2 col-sm-3 col-xs-12 form-group"> 
            <select name="user_type" class="form-control" >
            <option value="">Select User</option>
            @foreach($user_roles as $role)
                        	
<option value="{!! $role->id !!}">{{ucfirst( $role->role) }}</option>
             @endforeach
             </select>
             </div>    
             <div class="col-md-2 col-sm-3 col-xs-12  form-group">
                          
                          <button type="submit" class="btn btn-success">Save</button>
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

