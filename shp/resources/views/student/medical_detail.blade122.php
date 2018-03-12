@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                                	<div class="col-sm-offset-1 col-md-9">

                     <div class="col-sm-3" >
        <a class="feedback_form btn btn-primary activeform" href="{{ url('health-medical-detail?feedback_type=medical_detail') }}" id="medical_detail">
        Medical History
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="{{ url('health-medical-detail?feedback_type=physical_fitness') }}" id="physical_fitness">
        Physical Fitness
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="{{ url('health-medical-detail?feedback_type=mental_health') }}" id="mental_health">
        Mental Health
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="{{ url('health-medical-detail?feedback_type=diet_nutrition') }}" id="diet_nutrition">
        Diet Nutrition
        </a>
        </div>
                <br /><br /><br /> <br /><br />
             
	 @if($user_detail[0]->medical_detail_filled ==1)
                 Medical detail is already filled.
   	@else
                   
                    {!! Form::open(['role' => 'form', 'url' => 'health-medical-detail' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
             <input type="hidden" name="feedback_type" value="medical_detail">       
					<h4> 1.Has any member of your close family (parents, Grandparents, Siblings)had of the following condition?</h4>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Heart attack</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_heart_attack', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_heart_attack', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_heart_attack', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">High Blood Pressure</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_high_blood_pressure', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_high_blood_pressure', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_high_blood_pressure', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Diabetes</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_diabetes', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_diabetes', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_diabetes', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Hyper Cholesterol</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_hyper_cholesterol', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_hyper_cholesterol', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_hyper_cholesterol', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Cancer</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_cancer', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_cancer', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_cancer', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Obesity / Overweight</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_obesity_overweight', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_obesity_overweight', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_obesity_overweight', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Asthma</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_asthma', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_asthma', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('family_asthma', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div> 
					<hr>
						<h4>2.Does your ward have any of the following conditions, please indicate details if aware, along side?</h4>
						
						<div class="form-group">
                            	<label class="col-sm-3 control-label">High Blood Pressure</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('ward_high_blood_pressure', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('ward_high_blood_pressure', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('ward_high_blood_pressure', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div> 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">High Blood Sugar Random</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('ward_high_blood_sugar_random', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('ward_high_blood_sugar_random', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('ward_high_blood_sugar_random', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div> 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Low Hemoglobin (Anemia)</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('ward_low_hemoglobin', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('ward_low_hemoglobin', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('ward_low_hemoglobin', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div> 
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Asthma</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('ward_asthma', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('ward_asthma', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('ward_asthma', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
						<hr>
					<h4>3.Does your ward undergo an Annual Periodic medical check up including Eyes, teeth, Ears, Nose, Throat and Physicians consultation? </h4>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Medical Check Up</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('medical_check_up', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('medical_check_up', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('medical_check_up', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<hr>
					<h4>4.	Has  your ward had all Vaccinations / immunizations as mentioned : vaccine:</h4>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">BCG  gainst T.B.</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('bcg_gainst_tb', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('bcg_gainst_tb', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Hepatitis ‘B’ Vaccine against Jaundice</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('hepatitis_b_vaccine_against_jaundice', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('hepatitis_b_vaccine_against_jaundice', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Diphlheria , Whooping  cough , Tetanus (DPT)</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('diphlheria_whooping_cough_tetanus', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('diphlheria_whooping_cough_tetanus', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Hepatitis ‘A’ Vaccine</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('hepatitis_a_vaccine', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('hepatitis_a_vaccine', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Tetanus (booster) /  DP (booster)</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('tetanus_dp', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('tetanus_dp', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Oral polio Vaccine</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('oral_polio_vaccine', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('oral_polio_vaccine', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Measles, Mumps, Ruebella (MMR)</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('measles_mumps_ruebella', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('measles_mumps_ruebella', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Chicken pox</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('chicken_pox', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('chicken_pox', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Typhoid</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('typhoid', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('typhoid', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					<hr>
					<h4>5.   Has your ward had any major operation/hospitalization at any time in the past?</h4>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">chronic illness</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('chronic_illness', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('chronic_illness', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('chronic_illness', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<hr>
					<h4>6.   Is your ward under treatment or medication at present for the following (tick appropriately):<h4>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Cough and Cold</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('cough_and_cold', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('cough_and_cold', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('cough_and_cold', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Fever</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('fever', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('fever', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('fever', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Bronchitis</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('bronchitis', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('bronchitis', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('bronchitis', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Urinary Track infection</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('urinary_track_infection', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('urinary_track_infection', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
								 <div class="col-sm-4">
                                     	 <label class="col-sm-8 control-label">Not sure</label>
                              			 <div class="col-sm-4">
								{!! Form::radio('urinary_track_infection', 'not sure',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
					<div class="form-group">
                            	<label class="col-sm-3 control-label">Other (please specify)</label>
                                <div class="col-sm-9">
					{!! Form::text('other_treatment', null, ['class' => 'form-control reqiured','id'=>'other (please specify)']) !!}
                                </div>
                    </div> 	
                    <hr>
					<h4>7.   Is your ward allergic to any medicine/food?</h4>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Is your ward allergic to any medicine/food?</label>
                                <div class="col-sm-9">
					{!! Form::textarea('ward_allergic', null, ['class' => 'form-control reqiured','id'=>'ward_allergic']) !!}
                                </div>
                    </div>				 
                          
                           <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Submit" id="add-user" class="btn-orange">
                                </div>
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
                    
                  @endif
                   
                    
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

