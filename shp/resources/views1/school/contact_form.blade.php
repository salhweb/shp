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
                    {!! Form::open(['role' => 'form', 'url' => 'message' ,'id' => 'message' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
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
                                	<div class="btn-group btn-group1">
                                     <button class="btn dropdown-toggle" data-toggle="dropdown" id="class_dropdown" aria-expanded="true">Section<b class="caret"></b></button>
                     @if (isset($sections))
					 @if (count($sections) > 0)
                                         <ul class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenu2" role="menu" id="sections">
					 @foreach($sections as $section)
                                           <li><a tabindex="-1" id="{!!$section->id!!}" href="javascript:void(0);" > {!! ucfirst($section->section_name) !!}</a></li>
                                         @endforeach
                                         </ul>
					@endif
                    @endif
                                     </div>
                                </div>
                                </div>	                    
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Message</label>
                                <div class="col-sm-9">
                   	{!! Form::textarea('your_message', null, array('placeholder'=>'Message', 'id'=>"your_message",'class'=>'form-control reqiured'), ['size' => '25x4']) !!}
                    </div>
                    </div>
                    
                    </div>
                     {!! Form::hidden('class_id', null,array('id'=>"class_id" , 'class'=>"form-control" )) !!}
                     {!! Form::hidden('section_id', null,array('id'=>"section_id" , 'class'=>"form-control" )) !!}
                {!! Form::hidden('school_id', Auth::user()->id,array('id'=>"school_id" , 'class'=>"form-control" )) !!}               
                       
                           <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Submit" id="add-user" class="btn-orange">
                                </div>
                           </div>   
                        {!! Form::close() !!}
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
	$('#sections li a').click(function(){ 
	     var id = $(this).attr('id');
		 
		$('#section_id').val(id);
		
		
	});

    $('#multiple-selected').multiselect();

});

function wholeformcheck() { 
   var isFormValid = true;
  
			 var fields = $("#add-syllabus")
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
	
	 if (isFormValid) {  $("#add-syllabus").submit();}
	 else{}
	return false;	
}
</script>
@endsection

