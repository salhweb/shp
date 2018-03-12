@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                <h2>Overall Health</h2>
                  
       <div class="col-sm-4" >
        <a class="assessment_form btn btn-primary activeform" href="{{ url('my-health-report?assessment_type=general_assessment') }}" id="general_assessment">
       General Assessment
        </a>
        </div>
        <div class="col-sm-5" >
         <a class="assessment_form btn btn-primary" href="{{ url('my-health-report?assessment_type=growth_development_assessment') }}" id="growth_development_assessment">
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
        </div>
                <br /><br /><br /> <br /><br />
                  @if(isset($user_detail))
                    @if(count($user_detail)>0)
                   <!--/* <div  class="col-sm-6">
                   
                    <div class="gauge1 demo1">  </div>
                     <h3 class="heading_metter" > Overall Health </h3>
                    </div> 
                    <div  class="col-sm-6"> 
                    
                     <div class="gauge2 demo1"></div>
                     <h3 class="heading_metter"> General Health </h3> 
                     </div>*/-->
                    {!! HTML::script('assets/js/jquery-gauge.min.js') !!}
                    {!! HTML::style('assets/css/jquery-gauge.css') !!}
    <script>
/*	$(document).ready(function(e) {
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
		  });*/
    </script> 
                
                    {!! Form::open(['role' => 'form','id' => 'create-user' ,'class' => 'form-horizontal']) !!}
<?php 
$health_value = ($user_detail[0]->overall_health_rank/5)*100; 
?>
              <input type="hidden"  id="overall_health_rank" value=" {{$health_value}}" />
                <input type="hidden"  id="overall_health_perctange" value="{{$overall_health_percentage}}" />
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
             <input type="hidden" name="student_id" id="student_id" value=" {{ app('request')->input('student_id') }}" />
                    
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">How is the growth of the student</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('student_growth', $user_detail[0]->student_growth, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'student_growth']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student suffer from tonsillitis</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('tonsillitis', $user_detail[0]->tonsillitis, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'tonsillitis']) !!}                                	
								</div>
					</div>
					 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student suffering from Hydrocele</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('hydrocele', $user_detail[0]->hydrocele, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'hydrocele']) !!}                                	
								</div>
					</div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is there need to consult the dietician</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('consult_dietician', $user_detail[0]->consult_dietician, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'consult_dietician']) !!}                                	
								</div>
					</div>
					
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student suffering from vision problem</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('vision_problem', $user_detail[0]->vision_problem, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'vision_problem']) !!}                                	
								</div>
					</div>
                            			 
						<div class="form-group">
                            	<label class="col-sm-3 control-label">Is there need to consult opthomologist</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('consult_opthomologist', $user_detail[0]->consult_opthomologist, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'consult_opthomologist']) !!}                                	
								</div>
					</div>
                         <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student having any hearing problem</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('hearing_problem', $user_detail[0]->hearing_problem, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'hearing_problem']) !!}                                	
								</div>
					</div>   
                           			 
					  <div class="form-group">
                            	<label class="col-sm-3 control-label">Is there need to consult an ENT doctor</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('need_ENT_doctor', $user_detail[0]->need_ENT_doctor, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'need_ENT_doctor']) !!}                                	
								</div>
					</div>   
					
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Is the student suffering from unattended dental problems</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('unattended_dental_problems', $user_detail[0]->unattended_dental_problems, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'unattended_dental_problems']) !!}                                	
								</div>
					</div>   
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Is there a need to consult a dentist</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('consult_dentist', $user_detail[0]->consult_dentist, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'consult_dentist']) !!}                                	
								</div>
					</div>  
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student suffer from any learning disability</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('learning_disability', $user_detail[0]->learning_disability, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'learning_disability']) !!}                                	
								</div>
					</div> 
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Is there need to consult a speech therapist</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('speech_therapist', $user_detail[0]->speech_therapist, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'speech_therapist']) !!}                                	
								</div>
					</div> 
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Does the student have any skin infection</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('skin_infection', $user_detail[0]->skin_infection, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'skin_infection']) !!}                                	
								</div>
					</div>
						
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Is there need to consult Dermatologist</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('consult_dermatologist', $user_detail[0]->consult_dermatologist, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'consult_dermatologist']) !!}                                	
								</div>
					</div>		
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">How is the cardiac condition of the student</label>
                                <div class="col-sm-9">
                               		 
                                {!! Form::text('cardiac_condition', $user_detail[0]->cardiac_condition, ['readonly'=>'readonly','class' =>'form-control reqiured', 'id'=>'cardiac_condition']) !!}                                	
								</div>
					</div>
				
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there a need to consult Cardiologist</label>
                            <div class="col-sm-9">
                             	{!! Form::text('consult_cardiologist', $user_detail[0]->consult_cardiologist, ['readonly'=>'readonly','class' =>'form-control reqiured','id'=>'consult_cardiologist']) !!}
										
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there a need for further consultation with a Physician</label>
                            <div class="col-sm-9">
                             	{!! Form::text('physician_consultation', $user_detail[0]->physician_consultation, ['readonly'=>'readonly','class' =>'form-control reqiured','id'=>'physician_consultation']) !!}
										
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Is there a need for further consultation with a Clinical psychologist</label>
                            <div class="col-sm-9">
                             	{!! Form::text('clinical_psychologist_consultation', $user_detail[0]->clinical_psychologist_consultation, ['readonly'=>'readonly','class' =>'form-control reqiured','id'=>'clinical_psychologist_consultation']) !!}
										
							</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Overall Health Rank </label>
                            <div class="col-sm-9">
                             	{!! Form::text('overall_health_rank', $user_detail[0]->overall_health_rank, ['readonly'=>'readonly','class' =>'form-control reqiured','id'=>'overall_health_rank']) !!}
										
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

