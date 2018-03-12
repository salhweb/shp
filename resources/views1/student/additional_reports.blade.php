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
     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Report</button>
    <br> <br>
    @if(isset($student_details))
       @foreach($student_details as $student_detail)
         
            <h3>{!! $student_detail->report_subject !!}</h3> <br>
           <p>{!! $student_detail->report_details !!} </p><br>
            @if($student_detail->report_attachment !='')
              <?php $a = 1; ?>
               @foreach(explode(',', $student_detail->report_attachment) as $report) 
                        {!! HTML::link('/'.$report,"Report".$a) !!}, </tr>
                <?php $a++; ?>   
                @endforeach
            @endif
            
       
         <hr>
       @endforeach
    
    @endif
                    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="background:#43c5b8;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Additional Reports</h4>
      </div>
      <div class="modal-body">
                    {!! Form::open(['role' => 'form', 'url' => 'additional-reports' ,'id' => 'message' ,'class' => 'form-horizontal','files' => true]) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      <div class="form-group">
                            	
                                <div class="col-sm-12">
                                	
                                </div>
                                </div>
                                <div class="form-group">
                            	
                                <div class="col-sm-12">
                                {!! Form::text('report_heading', null, ['placeholder'=>'Report Heading','class' =>'form-control reqiured', 'id'=>'report_heading']) !!}  	
                                </div>
                                </div>	                    
                    <div class="form-group">
                            	
                                <div class="col-sm-12">
                   	{!! Form::textarea('report_details', null, array('placeholder'=>'Report Details', 'id'=>"report_details",'class'=>'form-control reqiured'), ['size' => '25x4']) !!}
                    </div>
                    </div>
                    <div class="form-group">
                            	
                                <div class="col-sm-12">
                    {!! Form::file('attached_reports[]',array('multiple' => 'multiple','class'=>'form-control')) !!}
                    </div>
                    </div>
                    
             
                       
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

