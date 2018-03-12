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
         <a class="assessment_form btn btn-primary activeform" href="{{ url('my-health-report?assessment_type=hearing_assessment') }}" id="hearing_assessment">
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
                     <h3 class="heading_metter"> General Health </h3> 
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
                    
					<h2>Right Ear Audiogram</h2>

					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 125</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('right_ear_125', $user_detail[0]->right_ear_125, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'right_ear_125']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 250</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('right_ear_250', $user_detail[0]->right_ear_250, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'right_ear_250']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 500</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('right_ear_500', $user_detail[0]->right_ear_500, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'right_ear_500']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 1000</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('right_ear_1000', $user_detail[0]->right_ear_1000, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'right_ear_1000']) !!}                                	
								</div>
					</div><div class="form-group">
                            	<label class="col-sm-3 control-label">For 2000</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('right_ear_2000', $user_detail[0]->right_ear_2000, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'right_ear_2000']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 4000</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('right_ear_4000', $user_detail[0]->right_ear_4000, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'right_ear_4000']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 8000</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('right_ear_8000', $user_detail[0]->right_ear_8000, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'right_ear_8000']) !!}                                	
								</div>
					</div>
					
					
					
					<div class="form-group">
                      <label class="col-sm-3 control-label">Right Ear Comments</label>
                              			 <div class="col-sm-9"> 
					{!! Form::textarea('right_ear_comments', $user_detail[0]->right_ear_comments, ['readonly'=>'readonly', 'id'=>"right_ear_comments" , 'class'=>"form-control required" ]) !!}
				
                                </div>
                                </div>
					<h2>Left Ear Audiogram</h2>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 125</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('left_ear_125', $user_detail[0]->left_ear_125, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'left_ear_125']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 250</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('left_ear_250', $user_detail[0]->left_ear_250, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'left_ear_250']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 500</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('left_ear_500', $user_detail[0]->left_ear_500, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'left_ear_500']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 1000</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('left_ear_1000', $user_detail[0]->left_ear_1000, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'left_ear_1000']) !!}                                	
								</div>
					</div><div class="form-group">
                            	<label class="col-sm-3 control-label">For 2000</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('left_ear_2000', $user_detail[0]->left_ear_2000, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'left_ear_2000']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 4000</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('left_ear_4000', $user_detail[0]->left_ear_4000, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'left_ear_4000']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">For 8000</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('left_ear_8000', $user_detail[0]->left_ear_8000, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'left_ear_8000']) !!}                                	
								</div>
					</div>
					
					
					
					<div class="form-group">
                      <label class="col-sm-3 control-label">Left Ear Comments</label>
                              			 <div class="col-sm-9"> 
					{!! Form::textarea('left_ear_comments', $user_detail[0]->left_ear_comments, ['readonly'=>'readonly', 'id'=>"left_ear_comments" , 'class'=>"form-control required" ]) !!}
				
                                </div>
                                </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Do you have giddiness</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('giddiness', $user_detail[0]->giddiness, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'giddiness']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Ear discharge if any </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('ear_discharge',$user_detail[0]->ear_discharge, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'ear_discharge']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Ear Wax</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('ear_wax', $user_detail[0]->ear_wax, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'ear_wax']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Do you have a humming sound in ear </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('humming_sound', $user_detail[0]->humming_sound, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'humming_sound']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Overall Health Rank </label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('overall_health_rank', $user_detail[0]->overall_health_rank, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'overall_health_rank']) !!}                                	
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

