@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
				  	<div class="col-sm-offset-1 col-md-9">
                    <center><h1>Growth Development Assissment</h1></center>
					<!--<div class="col-sm-4" >
        <a class="assessment_form btn btn-primary " href="{{ url('my-health-report?assessment_type=general_assessment') }}" id="general_assessment">
       General Assessment
        </a>
        </div>
        <div class="col-sm-5" >
         <a class="assessment_form btn btn-primary activeform" href="{{ url('my-health-report?assessment_type=growth_development_assessment') }}" id="growth_development_assessment">
        Growth & Development Assessment
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="assessment_form btn btn-primary" href="{{ url('my-health-report?assessment_type=hearing_assessment') }}" id="hearing_assessment">
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
                     <h3 class="heading_metter"> Growth Development </h3> 
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
                            	<label class="col-sm-3 control-label">Height(cms)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('height', $user_detail[0]->height, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'height']) !!}                                	
								</div>
					</div>
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Weight(kgs)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('weight', $user_detail[0]->weight, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'weight']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">BP Sys</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('bp_sys', $user_detail[0]->bp_sys, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'bp_sys']) !!}                                	
								</div>
					</div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Bp Dia</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('bp_dia', $user_detail[0]->bp_dia, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'bp_dia']) !!}                                	
								</div>
					</div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Pulse</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('pulse', $user_detail[0]->pulse, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'pulse']) !!}                                	
								</div>
					</div>
					  <div class="form-group">
                            	<label class="col-sm-3 control-label">Lung Capacity (Lt/Min)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('lung_capacity', $user_detail[0]->lung_capacity, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'lung_capacity']) !!}                                	
								</div>
					</div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Oxygen Saturation (%)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('oxygen_saturation', $user_detail[0]->oxygen_saturation, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'oxygen_saturation']) !!}                                	
								</div>
					</div>
					 
					  <div class="form-group">
                            	<label class="col-sm-3 control-label">Jumping Height (cms)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('jumping_height', $user_detail[0]->jumping_height, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'jumping_height']) !!}                                	
								</div>
					</div>
					 
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Hopping Distance (cms)</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('hopping_distance', $user_detail[0]->hopping_distance, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'hopping_distance']) !!}                                	
								</div>
					</div>
                  			 
					  <div class="form-group">
                            	<label class="col-sm-3 control-label">Can bend back</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('can_bend_back', $user_detail[0]->can_bend_back, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'can_bend_back']) !!}                                	
								</div>
					</div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Can squat</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('can_squat', $user_detail[0]->can_squat, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'can_squat']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Spine Shape</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('spine_shape', $user_detail[0]->spine_shape, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'spine_shape']) !!}                                	
								</div>
					</div>
					 
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Gait</label>
                                <div class="col-sm-9">
					{!! Form::text('gait', $user_detail[0]->gait, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'gait']) !!}
                                </div>
                   	</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Can fold all fingers of the left hand</label>
                                <div class="col-sm-9">
					{!! Form::text('left_hand_fingers_fold', $user_detail[0]->left_hand_fingers_fold, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'left_hand_fingers_fold']) !!}
                                </div>
                   	</div>
                  <div class="form-group">
                            	<label class="col-sm-3 control-label">Can fold all fingers of the right hand</label>
                                <div class="col-sm-9">
					{!! Form::text('right_hand_fingers_fold', $user_detail[0]->right_hand_fingers_fold, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'right_hand_fingers_fold']) !!}
                                </div>
                   	</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Can the left hand middle finger touch the shoulder</label>
                                <div class="col-sm-9">
					{!! Form::text('left_hand_middle_finger_touch_the_shoulder', $user_detail[0]->left_hand_middle_finger_touch_the_shoulder, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'left_hand_middle_finger_touch_the_shoulder']) !!}
                                </div>
                   	</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Can the right hand middle finger touch the shoulder</label>
                                <div class="col-sm-9">
					{!! Form::text('right_hand_middle_finger_touch_the_shoulder', $user_detail[0]->right_hand_middle_finger_touch_the_shoulder, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'right_hand_middle_finger_touch_the_shoulder']) !!}
                                </div>
                   	</div>
						
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Can the left hand middle finger touch the spine</label>
                                <div class="col-sm-9">
					{!! Form::text('left_hand_middle_finger_touch_the_spine', $user_detail[0]->left_hand_middle_finger_touch_the_spine, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'left_hand_middle_finger_touch_the_spine']) !!}
                                </div>
                   	</div>
						
						<div class="form-group">
                            	<label class="col-sm-3 control-label">Can the right hand middle finger touch the spine</label>
                                <div class="col-sm-9">
					{!! Form::text('right_hand_middle_finger_touch_the_spine', $user_detail[0]->right_hand_middle_finger_touch_the_spine, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'right_hand_middle_finger_touch_the_spine']) !!}
                                </div>
                   	</div>
						
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Has the student suffered from fracture in the current year</label>
                                <div class="col-sm-9">
					{!! Form::text('student_suffered_fracture', $user_detail[0]->student_suffered_fracture, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'student_suffered_fracture']) !!}
                                </div>
                   	</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student have post fracture stiffness</label>
                                <div class="col-sm-9">
					{!! Form::text('post_fracture_stiffness', $user_detail[0]->post_fracture_stiffness, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'post_fracture_stiffness']) !!}
                                </div>
                   	</div>	
						
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student suffer from Knock-Knees</label>
                                <div class="col-sm-9">
					{!! Form::text('suffer_from_knock_knees', $user_detail[0]->suffer_from_knock_knees, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'suffer_from_knock_knees']) !!}
                                </div>
                   	</div>	
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Overall Health Rank</label>
                                <div class="col-sm-9">
					{!! Form::text('overall_health_rank', $user_detail[0]->overall_health_rank, ['readonly'=>'readonly','class' => 'form-control reqiured','id'=>'overall_health_rank']) !!}
                                </div>
                   	</div>	
					
                        {!! Form::close() !!}
                        @else
                        <h3>No record found.</h3>
                        @endif                    
                        @endif

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

