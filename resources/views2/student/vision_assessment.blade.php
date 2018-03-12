@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    <center><h1>Vission Assissment</h1></center>
					<!--<div class="col-sm-4" >
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
         <a class="assessment_form btn btn-primary activeform" href="{{ url('my-health-report?assessment_type=vision_assessment') }}" id="vision_assessment">
       Vision Assessment
        </a>
        </div>
        <span class="break"></span>
        <br /><br />
                 <div class="col-sm-5" >
          <a class="assessment_form btn btn-primary " href="{{ url('my-health-report?assessment_type=learning_disability_assessment') }}" id="learning_disability_assessment">
        Learning Disability Assessment
        </a>
        </div>-->
                <br /><br /><br /> <br /><br />
                @if(isset($user_detail))
                    @if(count($user_detail)>0)
                    <div  class="col-sm-6">
                   
                    <div class="gauge1 demo1">  </div>
                     <h3 class="heading_metter" > Overall Health </h3>
                    </div> 
                    <div  class="col-sm-6"> 
                    
                     <div class="gauge2 demo1"></div>
                     <h3 class="heading_metter"> Vission Health </h3> 
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
 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
           <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />        	
       
					
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the child suffering from ocular alignment (squint)</label>
                                <div class="col-sm-9">
					{!! Form::text('ocular_alignment', $user_detail[0]->ocular_alignment, ['readonly'=>'readonly', 'id'=>'ocular_alignment' , 'class' => 'form-control']) !!}
                                </div>
                            </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the child wearing spectacles or lens</label>
                                <div class="col-sm-9">
					{!! Form::text('wearing_spectacles', $user_detail[0]->wearing_spectacles, ['readonly'=>'readonly', 'id'=>'wearing_spectacles' , 'class' => 'form-control']) !!}
                                </div>
                            </div>
					  <div class="form-group">
                            	<label class="col-sm-3 control-label">Is there red or watery crust in the eye</label>
                                <div class="col-sm-9">
					{!! Form::text('crust_in_the_eye', $user_detail[0]->crust_in_the_eye, ['readonly'=>'readonly', 'id'=>'crust_in_the_eye' , 'class' => 'form-control']) !!}
                                </div>
                            </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is there any white pupil</label>
                                <div class="col-sm-9">
					{!! Form::text('white_pupil', $user_detail[0]->white_pupil, ['readonly'=>'readonly', 'id'=>'white_pupil' , 'class' => 'form-control']) !!}
                                </div>
                            </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the eye wandering</label>
                                <div class="col-sm-9">
					{!! Form::text('eye_wandering', $user_detail[0]->eye_wandering, ['readonly'=>'readonly', 'id'=>'eye_wandering' , 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            			 
				<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student rubbing eyes frequently</label>
                                <div class="col-sm-9">
					{!! Form::text('rubbing_eyes', $user_detail[0]->rubbing_eyes, ['readonly'=>'readonly', 'id'=>'rubbing_eyes' , 'class' => 'form-control']) !!}
                                </div>
                            </div>
                          <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student unusually sensitive to bright light</label>
                                <div class="col-sm-9">
					{!! Form::text('bright_light', $user_detail[0]->bright_light, ['readonly'=>'readonly', 'id'=>'bright_light' , 'class' => 'form-control']) !!}
                                </div>
                            </div> 			 
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student color blind</label>
                                <div class="col-sm-9">
					{!! Form::text('color_blind', $user_detail[0]->color_blind, ['readonly'=>'readonly', 'id'=>'color_blind' , 'class' => 'form-control']) !!}
                                </div>
                            </div> 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student suffer from night blindness</label>
                                <div class="col-sm-9">
					{!! Form::text('night_blindness', $user_detail[0]->night_blindness, ['readonly'=>'readonly', 'id'=>'night_blindness' , 'class' => 'form-control']) !!}
                                </div>
                            </div> 
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student suffer from nausea while studying</label>
                                <div class="col-sm-9">
					{!! Form::text('nausea', $user_detail[0]->nausea, ['readonly'=>'readonly', 'id'=>'nausea' , 'class' => 'form-control']) !!}
                                </div>
                            </div> 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student suffer from headache after or while reading</label>
                                <div class="col-sm-9">
					{!! Form::text('suffer_from_headache', $user_detail[0]->suffer_from_headache, ['readonly'=>'readonly', 'id'=>'suffer_from_headache' , 'class' => 'form-control']) !!}
                                </div>
                            </div> 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student thrusting his head forward or backward while looking at distant object</label>
                                <div class="col-sm-9">
					{!! Form::text('thrusting_head', $user_detail[0]->thrusting_head, ['readonly'=>'readonly', 'id'=>'thrusting_head' , 'class' => 'form-control']) !!}
                                </div>
                            </div> 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student turning or tilting the head to one side while reading</label>
                                <div class="col-sm-9">
					{!! Form::text('student_turning', $user_detail[0]->student_turning, ['readonly'=>'readonly', 'id'=>'student_turning' , 'class' => 'form-control']) !!}
                                </div>
                            </div> 
						
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student placing the head close to book while reading</label>
                                <div class="col-sm-9">
					{!! Form::text('head_close_to_book', $user_detail[0]->head_close_to_book, ['readonly'=>'readonly', 'id'=>'head_close_to_book' , 'class' => 'form-control']) !!}
                                </div>
                            </div> 		
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student suffer from blurred vision or double image</label>
                                <div class="col-sm-9">
					{!! Form::text('blurred_vision', $user_detail[0]->blurred_vision, ['readonly'=>'readonly', 'id'=>'blurred_vision' , 'class' => 'form-control']) !!}
                                </div>
                            </div> 	
					
					
					<h4>Visual Acuity</h4>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Left Eye</label>
                                <div class="col-sm-9">
					{!! Form::text('left_eye_acuity',$user_detail[0]->left_eye_acuity, ['readonly'=>'readonly', 'id'=>'left_eye_acuity' , 'class' => 'form-control']) !!}
                                </div>
					</div>					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Right Eye</label>
                                <div class="col-sm-9">
					{!! Form::text('right_eye_acuity', $user_detail[0]->right_eye_acuity, ['readonly'=>'readonly', 'id'=>'right_eye_acuity' , 'class' => 'form-control']) !!}
                                </div>
					</div>
					<h4>Refractometer Readings</h4>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Right Spherical</label>
                                <div class="col-sm-9">
					{!! Form::text('right_spherical', $user_detail[0]->right_spherical, ['readonly'=>'readonly', 'id'=>'right_spherical' , 'class' => 'form-control']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Left Spherical</label>
                                <div class="col-sm-9">
					{!! Form::text('left_spherical',$user_detail[0]->left_spherical, ['readonly'=>'readonly', 'id'=>'left_spherical' , 'class' => 'form-control']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Right Cylindrical</label>
                                <div class="col-sm-9">
					{!! Form::text('right_cylindrical', $user_detail[0]->right_cylindrical, ['readonly'=>'readonly', 'id'=>'right_cylindrical' , 'class' => 'form-control']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Left cy</label>
                                <div class="col-sm-9">
					{!! Form::text('left_cylindrical', $user_detail[0]->left_cylindrical, ['readonly'=>'readonly', 'id'=>'left_cylindrical' , 'class' => 'form-control']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Right Axis</label>
                                <div class="col-sm-9">
					{!! Form::text('right_axis', $user_detail[0]->right_axis, ['readonly'=>'readonly', 'id'=>'right_axis' , 'class' => 'form-control']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Left Axis</label>
                                <div class="col-sm-9">
					{!! Form::text('left_axis', $user_detail[0]->left_axis, ['readonly'=>'readonly', 'id'=>'left_axis' , 'class' => 'form-control']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Indication for consultation with an opthomologist</label>
                                <div class="col-sm-9">
					{!! Form::text('opthomologist_consultation', $user_detail[0]->opthomologist_consultation, ['readonly'=>'readonly', 'id'=>'opthomologist_consultation' , 'class' => 'form-control']) !!}
                                </div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Overall Health Rank</label>
                                <div class="col-sm-9">
					{!! Form::text('overall_health_rank', $user_detail[0]->overall_health_rank, ['readonly'=>'readonly', 'id'=>'overall_health_rank' , 'class' => 'form-control']) !!}
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

