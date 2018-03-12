@extends('layouts.main')
@section('content')
   <div class="content">
    	<div class="container">
          @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                     <h2>Send a new message</h2>
                    {!! Form::open(['role' => 'form', 'url' => 'messages' ,'id' => 'message' ,'class' => 'form-horizontal']) !!} 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                   <div class="form-group">
                        <label class="col-sm-3 control-label">Send To</label>
                                <div class="col-md-9 col-sm-9 col-xs-12 form-group">
                                <select class="form-control required" name="user_type" id="user_type">
                                <option value="">Select User Type</option>	
                     @if (isset($send_to_users))
					 @if (count($send_to_users) > 0)
					 @foreach($send_to_users as $send_to_user)
                     						@if($send_to_user->role !='administrator')
                                           <option value="{!!$send_to_user->id!!}">{!! ucfirst($send_to_user->role) !!}</option>
                                           @endif
                                         @endforeach
                                         </ul>
					@endif
                    @endif
                    			</select>
                                </div>
                    </div>
                    <div class="student_selected" style="display:none;">
                     <div class="col-md-9 col-sm-9 col-xs-12 form-group">
                            	<label class="col-sm-3 control-label">School</label>
                                <div class="col-sm-9">
                                	<select class="btn-group" name="school_id" id="school_id">
                     @if (isset($schools))
					 @if (count($schools) > 0)
                     			<option >Select School</option>
					 @foreach($schools as $school)
                     						<option value="{!!$school->id!!}">{!! ucfirst($school->school_name) !!}</option>
                    @endforeach
                                         
					@endif
                    @endif
                    </select>                
                                </div>
                                </div>
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Class</label>
                                <div class="col-sm-9">
                                <select class="btn-group" name="class_id" id="class_id">

                     @if (isset($classes))
					 @if (count($classes) > 0)
                     		                     			<option >Select Class</option>

					 @foreach($classes as $class)
                     						<option value="{!!$class->id!!}">{!! ucfirst($class->class_name) !!}</option>
                                         @endforeach
                                        
					@endif
                    @endif
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                            	<label class="col-sm-3 control-label">Section</label>
                                <div class="col-sm-9">
                                <select class="btn-group" name="section_id" id="section_id">

                     @if (isset($sections))
					 @if (count($sections) > 0)
                       			<option >Select Section</option>
					 @foreach($sections as $section)
                           						<option value="{!!$section->id!!}">{!! ucfirst($section->section_name) !!}</option>

                                         @endforeach 
					@endif
                    @endif
                          </select>
                                </div>
                                </div>
                                </div>
                   <div class="form-group select_user">
                      <label class="col-sm-3 control-label">User Name</label>
                              			 <div class="col-sm-9"> 
					{!! Form::text('select_user', null,array('placeholder'=>'User Name', 'id'=>"select_user" , 'class'=>"form-control required auto-suggest" )) !!}
				{!! Form::hidden('user_id', null,array('id'=>"user_id" , 'class'=>"form-control" )) !!}
                                </div>
                                </div>
                                
                                         
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Message</label>
                                <div class="col-sm-9">
                   	{!! Form::textarea('your_message', null, array('placeholder'=>'Message', 'id'=>"your_message",'class'=>'form-control reqiured'), ['size' => '25x4']) !!}
                    </div>
                    </div>
                    
                    </div>

                           <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                	<input class="btn  btn-primary" type="submit" value="Submit" id="add-user" >
                                </div>
                           </div>   
                        {!! Form::close() !!}
                        
                        
                                             <span class="break"></span>
                     <hr />
                     </br>
                     
                    <div class="messages">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    @if(isset($messages))
                    	@if(count($messages)>0)
                    	@foreach($messages as $message)
                        <div class="col-sm-1">
                        <div class="thumbnail">
                        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                        </div><!-- /thumbnail -->
                        </div><!-- /col-sm-1 -->
                        
                        <div class="col-sm-11">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <strong>{{$message->sender_name}}</strong> <span class="text-muted">commented on {{$message->message_date_time}} </span><span class="glyphicon glyphicon-circle-arrow-up" data-toggle="collapse" data-target="#comment_{{$message->id}}"></span>
                        </div>
                        <div class="panel-body" id="comment_{{$message->id}}">
                       {{$message->message}}
                        </div><!-- /panel-body -->
                        </div><!-- /panel panel-default -->
                        </div><!-- /col-sm-5 -->
                        @endforeach                        
                        @else
                        <h2>No previous messages.</h2>
                        @endif
                    @endif
                    </div>
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
	$("#user_type").change(function(){
		$('#user_id').val('');
		$("#select_user").val('');
		if($(this).val()==5){
			$(".student_selected").show();
		}
		else{
			$(".student_selected").hide();
		}
	});
	
	    $("#select_user").autocomplete({
		
		minLength:1,
			 autoFocus:true,
        source: function(request, response) {
            $.ajax({
                url: '{{URL('getusers')}}',
                
                data: {
                    term : request.term,
					user_type : $("#user_type").val(),
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
	       		 $('#user_id').val(ui.item.value); 
	       		 event.preventDefault(); 
			$("#select_user").val(ui.item.label);
			$('#student_feedback').removeClass('hide'); },
       
    });

});

function wholeformcheck() { 
   var isFormValid = true;
  
			 var fields = $("#message")
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
	
	 if (isFormValid) {  $("#message").submit();}
	 else{}
	return false;	
}
</script>
@endsection

