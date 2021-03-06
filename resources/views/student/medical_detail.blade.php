@extends('layouts.main')
@section('content')
<style>
</style>
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
                    <h1> Medical History <span class="pull-right"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Update  Medical History
</button></span></h1>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:#43c5b8;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Student Basic Checkup Details</h4>
      </div>
      <div class="modal-body">
                   
                    
                    {!! Form::open(['role' => 'form', 'url' => 'health-medical-detail' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
             <input type="hidden" name="feedback_type" value="medical_detail">

			<h2>1.Has any member of your close family (parents, Grandparents, Siblings)had of the following condition?</h2>
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
                                     	 <label class="col-sm-3 control-label">Not sure</label>
                              			 <div class="col-sm-9">
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
    </div>
  </div>
</div>
                    </div>
                   <br>
                    <hr style="clear:both;" /> <br>
                    
 <div class="row">
 <div class="col-md-12">
 <h2>1.Has any member of your close family (parents, Grandparents, Siblings)had of the following condition?</h2>
 
 <table id="datatable" class="table table-striped table-bordered">
                     @if(isset($med_det))
     
    @if(count($med_det)>0)
                      <thead>
                        <tr>
						<th>S/no</th>
                          <th scope="row">Family Heart Attack</th>
                          <th >Family H,B,P</th>
                          <th >Family Diabetes</th>
                          <th >Family Hyper Cholesterol</th>
                          <th>Family Cancer</th>
                          <th>Family Obesity Overweight</th>
                          <th>Asthma</th>
                          </tr>
						  </thead>
                          <tbody>
                      @foreach ($med_det as $key =>$med_de)
                        <tr>
                        <td>{{$key+1}}</td>
                          <td>{!! $med_de->family_heart_attack !!}</td>
                          <td>{!! $med_de->family_high_blood_pressure !!}</td>
                          <td>{!! $med_de->family_diabetes !!}</td>
                          <td>{!! $med_de->family_hyper_cholesterol !!}</td>
                          <td>{!! $med_de->family_cancer !!}</td>
                          <td>{!! $med_de->family_obesity_overweight !!}</td>
                          <td>{!! $med_de->family_asthma !!}</td>
                          </tr>
                          @endforeach
                           </tbody>
                          
                          
						 
                    </table>
                    
    @else
    <h2>No results found for your search</h2>
    @endif
    @endif
 
 
               
</div>
</div>
<hr style="clear:both;" />
<div class="row">
<div class="col-md-12">
 <h2>2.Does your ward have any of the following conditions, please indicate details if aware, along side?</h2>
 
 <table id="datatable" class="table table-striped table-bordered">
                     @if(isset($med_det))
     
    @if(count($med_det)>0)
                      <thead>
                        <tr>
						<th>S/no</th>
                          <th>Ward H.B.P</th>
                          <th>Ward High Blood Sugar Random</th>
                          <th>Ward Low Hemoglobin</th>
                          <th>Ward Asthma</th>
                          <th>Medical Check Up</th>
                          <th>Bcg Against TB</th>
                          <th>Hepatitis B Vaccine Against Jaundice</th>
                          </tr>
						  </thead>
                          <tbody>
                      @foreach ($med_det as $key =>$med_de)
                        <tr>
                        <td>{{$key+1}}</td>
                          <td>{!! $med_de->ward_high_blood_pressure !!}</td>
                          <td>{!! $med_de->ward_high_blood_sugar_random !!}</td>
                          <td>{!! $med_de->ward_low_hemoglobin !!}</td>
                          <td>{!! $med_de->ward_asthma !!}</td>
                          <td>{!! $med_de->medical_check_up !!}</td>
                          <td>{!! $med_de->bcg_gainst_tb !!}</td>
                          <td>{!! $med_de->hepatitis_b_vaccine_against_jaundice !!}</td>
                          </tr>
                          @endforeach
                           </tbody>
                          
                          
						 
                    </table>
                    
    @else
    <h2>No results found for your search</h2>
    @endif
    @endif
 
 
               
</div>
</div>
<hr style="clear:both;" />
<div class="row">
<div class="col-md-12">
 <h2>3.Does your ward undergo an Annual Periodic medical check up including Eyes, teeth, Ears, Nose, Throat and Physicians consultation? <br> 4.	Has your ward had all Vaccinations / immunizations as mentioned : vaccine </h2>
 
 <table id="datatable" class="table table-striped table-bordered">
                     @if(isset($med_det))
     
    @if(count($med_det)>0)
                      <thead>
                        <tr>
						<th>S/no</th>
                          <th>Diphlheria Whooping Cough Tetanus</th>
                          <th>Hepatitis A Vaccine</th>
                          <th>Tetanus DP</th>
                          <th>Oral Polio Vaccine</th>
                          <th>Measles Mumps Ruebella</th>
                          <th>Chicken Pox</th>
                          <th>Typhoid</th>
                          </tr>
						  </thead>
                          <tbody>
                      @foreach ($med_det as $key =>$med_de)
                        <tr>
                        <td>{{$key+1}}</td>
                          <td>{!! $med_de->diphlheria_whooping_cough_tetanus !!}</td>
                          <td>{!! $med_de->hepatitis_a_vaccine !!}</td>
                          <td>{!! $med_de->tetanus_dp !!}</td>
                          <td>{!! $med_de->oral_polio_vaccine !!}</td>
                          <td>{!! $med_de->measles_mumps_ruebella !!}</td>
                          <td>{!! $med_de->chicken_pox !!}</td>
                          <td>{!! $med_de->typhoid !!}</td>
                          </tr>
                          @endforeach
                           </tbody>
                          
                          
						 
                    </table>
                    
    @else
    <h2>No results found for your search</h2>
    @endif
    @endif
 
 
               
</div>
</div>
<hr style="clear:both;" />
<div class="row">
<div class="col-md-12">
 <h2>5. Has your ward had any major operation/hospitalization at any time in the past? <br> 6. Is your ward under treatment or medication at present for the following (tick appropriately)? <br> 7. Is your ward allergic to any medicine/food? </h2>
 
 <table id="datatable" class="table table-striped table-bordered">
                     @if(isset($med_det))
     
    @if(count($med_det)>0)
                      <thead>
                        <tr>
						<th>S/no</th>
                          <th>Chronic Illness</th>
                          <th>Cough And Cold</th>
                          <th>Fever</th>
                          <th>Bronchitis</th>
                          <th>Urinary Track Infection</th>
                          <th>Other Treatment</th>
                          <th>Ward Allergic</th>
                          
                          <th>Date Of Update</th>
                          </tr>
						  </thead>
                          <tbody>
                      @foreach ($med_det as $key =>$med_de)
                        <tr>
                        <td>{{$key+1}}</td>
                          <td>{!! $med_de->chronic_illness !!}</td>
                          <td>{!! $med_de->cough_and_cold !!}</td>
                          <td>{!! $med_de->fever !!}</td>
                          <td>{!! $med_de->bronchitis !!}</td>
                          <td>{!! $med_de->urinary_track_infection !!}</td>
                          <td>{!! $med_de->other_treatment !!}</td>
                          <td>{!! $med_de->ward_allergic !!}</td>
                          
                          <td>{!! $med_de->submitted_on !!}</td>
                          </tr>
                          @endforeach
                           </tbody>
                          
                          
						 
                    </table>
                    
    @else
    <h2>No results found for your search</h2>
    @endif
    @endif
 
 
               
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

