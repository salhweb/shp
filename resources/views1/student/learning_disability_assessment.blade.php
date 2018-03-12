@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
					<div class="col-sm-4" >
        <a class="assessment_form btn btn-primary " href="{{ url('my-health-report?assessment_type=general_assessment') }}" id="general_assessment">
       General Assessment
        </a>
        </div>
        <div class="col-sm-5" >
         <a class="assessment_form btn btn-primary " href="{{ url('my-health-report?assessment_type=growth_development_assessment') }}" id="growth_development_assessment">
        Growth & Development Assessment
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="assessment_form btn btn-primary " href="{{ url('my-health-report?assessment_type=hearing_assessment') }}" id="hearing_assessment">
       Hearing Assessment
        </a>
        </div>
        <span class="break"></span>
        <br /><br />
        <div class="col-sm-3" >
         <a class="assessment_form btn btn-primary " href="{{ url('my-health-report?assessment_type=dental_assessment') }}" id="dental_assessment">
        Dental Assessment
        </a>
        </div>

         <div class="col-sm-4" >
         <a class="assessment_form btn btn-primary " href="{{ url('my-health-report?assessment_type=sports_fitness_assessment') }}" id="sports_fitness_assessment">
        Sports Fitness Assessment
        </a>
        </div>
         <div class="col-sm-3" >
         <a class="assessment_form btn btn-primary " href="{{ url('my-health-report?assessment_type=vision_assessment') }}" id="vision_assessment">
       Vision Assessment
        </a>
        </div>
        <span class="break"></span>
        <br /><br />
                 <div class="col-sm-5" >
         <a class="assessment_form btn btn-primary activeform" href="{{ url('my-health-report?assessment_type=learning_disability_assessment') }}" id="learning_disability_assessment">
        Learning Disability Assessment
        </a>
        </div>
                <br /><br /><br /> <br /><br />
                  @if(isset($user_detail))
                    @if(count($user_detail)>0)
                    <div  class="col-sm-6">
                   
                    <div class="gauge1 demo1">  </div>
                     <h3 class="heading_metter" > Overall Health </h3>
                    </div> 
                    <div  class="col-sm-6"> 
                    
                     <div class="gauge2 demo1"></div>
                     <h3 class="heading_metter"> Learning Disability Health </h3> 
                     </div>
                    {!! HTML::script('assets/js/jquery-gauge.min.js') !!}
                    {!! HTML::style('assets/css/jquery-gauge.css') !!}
    <script>
	$(document).ready(function(e) {
 var overall_health_value = $("#overall_health_perctange").val();       
  
var health_value = $("#overall_health_rank").val();
//alert(overall_health_value);
        // first example
        // second example
		        $('.gauge1').gauge({
            values: {
                0 : '0%',
                20: '20%',
                40: '40%',
                60: '60%',
                80: '80%',
                100: '100%'
            },
            colors: {
                0 : '#ff0000',
				20 : '#ff7200',
				40 : '#ffea00',
                60: '#00f6ff',
                80: '#378618'
            },
            angles: [
                180,
                360
            ],
            lineWidth: 30,
            arrowWidth: 10,
            arrowColor: 'red',
            inset:true,

            value: overall_health_value
        });
		
		
		
        $('.gauge2').gauge({
            values: {
                0 : '0%',
                20: '20%',
                40: '40%',
                60: '60%',
                80: '80%',
                100: '100%'
            },
            colors: {
                 0 : '#ff0000',
				20 : '#ff7200',
				40 : '#ffea00',
                60: '#00f6ff',
                80: '#378618'
            },
            angles: [
                180,
                360
            ],
            lineWidth: 30,
            arrowWidth: 10,
            arrowColor: 'red',
            inset:true,

            value: health_value
        });
		  });
    </script> 
                
                    {!! Form::open(['role' => 'form','id' => 'create-user' ,'class' => 'form-horizontal']) !!}
<?php 
$health_value = ($user_detail[0]->overall_health_rank/5)*100
?>
              <input type="hidden"  id="overall_health_rank" value=" {{$health_value}}" />

 				<input type="hidden"  id="overall_health_perctange" value="{{$overall_health_percentage}}" />
			<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
             <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />        	
       	
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Activity status of the child</label>
                                <div class="col-sm-9">
					{!! Form::text('activity_status', $user_detail[0]->activity_status, ['readonly'=>'readonly', 'id'=>'activity_status' , 'class' => 'form-control ']) !!}
                                </div>
                            </div>
							<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student stammer</label>
                                <div class="col-sm-9">
					{!! Form::text('student_stammer', $user_detail[0]->student_stammer, ['readonly'=>'readonly', 'id'=>'student_stammer' , 'class' => 'form-control ']) !!}
                                </div>
                            </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student positive for Dyslexia</label>
                                <div class="col-sm-9">
					{!! Form::text('dyslexia', $user_detail[0]->dyslexia, ['readonly'=>'readonly', 'id'=>'dyslexia' , 'class' => 'form-control ']) !!}
                                </div>
                            </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student positive for Dyscalculia</label>
                                <div class="col-sm-9">
					{!! Form::text('dyscalculia', $user_detail[0]->dyscalculia, ['readonly'=>'readonly', 'id'=>'dyscalculia' , 'class' => 'form-control ']) !!}
                                </div>
                            </div>
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student positive for ADD</label>
                                <div class="col-sm-9">
					{!! Form::text('positive_for_ADD', $user_detail[0]->positive_for_ADD, ['readonly'=>'readonly', 'id'=>'positive_for_ADD' , 'class' => 'form-control ']) !!}
                                </div>
                            </div>
					
						<div class="form-group">
                            	<label class="col-sm-3 control-label">Indication for Consultation with a speech therapist</label>
                                <div class="col-sm-9">
					{!! Form::text('speech_therapist', $user_detail[0]->speech_therapist, ['readonly'=>'readonly', 'id'=>'speech_therapist' , 'class' => 'form-control ']) !!}
                                </div>
                            </div>						
								
								<div class="form-group">
                            	<label class="col-sm-3 control-label">Overall Health Rank</label>
                                <div class="col-sm-9">
					{!! Form::text('overall_health_rank', $user_detail[0]->overall_health_rank, ['readonly'=>'readonly', 'id'=>'overall_health_rank' , 'class' => 'form-control ']) !!}
                                </div>
                            </div>
					
                         {!! Form::close() !!}
                        @else
                        <h3>No record found.</h3>
                        @endif                    
                        @endif

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



@endsection

