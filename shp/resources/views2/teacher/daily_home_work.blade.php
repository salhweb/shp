@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
          @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
            <div class="task-form">
            <div class="x_title">
                    <h3>Add Student Homework </h3>
                  <div class="clearfix"></div>
                  </div>
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    {!! Form::open(['role' => 'form', 'url' => 'add-daily-home-work' ,'id' => 'add-syllabus' ,'class' => 'form-horizontal','files' => true]) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      <div class="form-group ">
                            	<label class="col-sm-3 control-label">Section</label>
                                <div class="col-sm-9">
                      @if (isset($sections))
					 @if (count($sections) > 0)
                                        <select class="form-control required" name="sections" > 
                                        <option value="">Select Section</option>
					 @foreach($sections as $section)
                                           <option value="{!!$section->id!!}" > {!! ucfirst($section->section_name) !!}
                                           </option>
                                         @endforeach
                                         </select>
					@endif
                    @endif
                                </div>
                                </div>
                                	                    
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Home Work</label>
                                <div class="col-sm-9">
                   	{!! Form::textarea('home_work', null, array('placeholder'=>'Home Work', 'id'=>"home_work",'class'=>'form-control reqiured'), ['size' => '25x4']) !!}
                    </div>
                    </div>
                     <div class="form-group">
                 
                           	<label  class="col-sm-3 control-label">Attach File</label>
                      <div class="col-sm-9">                             	
                                    
                              
			{!! Form::file('home_work_file',array('class'=>'form-control')) !!}
                           </div>
               </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-9">
                                <?php $date = date('Y-m-d'); ?>
                   	{!! Form::text('home_work_date', $date, array('placeholder'=>'Date', 'id'=>"home_work_date",'class'=>'form-control reqiured', 'readonly'=>'readonly'), ['size' => '25x4']) !!}
                    </div>
                    </div>
                     {!! Form::hidden('class_id', null,array('id'=>"class_id" , 'class'=>"form-control" )) !!}
                     {!! Form::hidden('section_id', null,array('id'=>"section_id" , 'class'=>"form-control" )) !!}
                {!! Form::hidden('school_id', Auth::user()->id,array('id'=>"school_id" , 'class'=>"form-control" )) !!}               
                       
                           <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Add Home Work" id="add-user" class="btn-orange">
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

