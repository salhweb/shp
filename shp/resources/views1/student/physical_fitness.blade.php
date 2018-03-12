@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
              @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
		{!! HTML::ul($errors->all()) !!}
            	<div class="row">
                <div class="col-sm-offset-1 col-md-9">
                     <div class="col-sm-3" >
        <a class="feedback_form btn btn-primary" href="{{ url('health-medical-detail?feedback_type=medical_detail') }}" id="medical_detail">
        Medical History
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary activeform" href="{{ url('health-medical-detail?feedback_type=physical_fitness') }}" id="physical_fitness">
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
                	 @if($user_detail[0]->physical_fitness_filled ==1)
                 Physical Fitness is already filled.
                 @else
                
                    {!! Form::open(['role' => 'form', 'url' => 'health-medical-detail' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
               <input type="hidden" name="feedback_type" value="physical_fitness">      
                   
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Taking your daily routine into account, how active are you?</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-3">
                               			 <label class="col-sm-3 control-label">Not active</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('how_active', 'not active', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-3">
                                     	 <label class="col-sm-3 control-label">Moderately active</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('how_active', 'moderately active',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                <div class="col-sm-3">
                                     	 <label class="col-sm-3 control-label">Active enough</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('how_active', 'active enough',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                <div class="col-sm-3">
                                     	 <label class="col-sm-3 control-label">Very active</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('how_active', 'Very active',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>	
                                </div>
                    </div> 	
                 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Do you undertake any  kind of exercise  before school or in the morning ?</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('do_excercise', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('do_excercise', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">If yes, tick the correct choice</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Walking</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('excercise_type', 'walking', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">Cycling</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('excercise_type', 'cycling',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Skipping</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('excercise_type', 'skipping', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">Gym</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('excercise_type', 'gym',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yoga</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('excercise_type', 'yoga', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">Sports</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('excercise_type', 'sports',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">Others</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('excercise_type', 'others',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">How many times a week is the above exercise undertaken ?</label>
                                <div class="col-sm-9">
					{!! Form::text('time_of_exercise', null, ['class' => 'form-control reqiured','id'=>'time_of_exercise']) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Do you play a game/sport in school ?</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('play_game_in_school', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('play_game_in_school', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">If yes, which one ?</label>
                                <div class="col-sm-9">
					{!! Form::text('which_game_play_in_school', null, ['class' => 'form-control reqiured','id'=>'which_game_play_in_school']) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">How many times a week?</label>
                                <div class="col-sm-9">
					{!! Form::text('time_of_game_in_school', null, ['class' => 'form-control reqiured','id'=>'time_of_game_in_school']) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Any outdoor activity undertaken in the evening ?</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('activity_in_evening', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('activity_in_evening', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">If yes, what ?</label>
                                <div class="col-sm-9">
					{!! Form::text('which_activity_in_evening', null, ['class' => 'form-control reqiured','id'=>'which_activity_in_evening']) !!}
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Any after dinner activity ?</label>
                                <div class="col-sm-9">
					{!! Form::text('activity_after_dinner', null, ['class' => 'form-control reqiured','id'=>'activity_after_dinner']) !!}
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Take a deep breathe. Can you hold your breath for 60 second?</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('hold_breathe', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('hold_breathe', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Can you touch your palms to the ground without Bending your Knees.</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('can_touch_palms', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('can_touch_palms', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
					 <label class="col-sm-3 control-label">How many sit-ups you can do continuously </label>
					 <div class="col-sm-9">
					{!! Form::input('number','sit_ups', null, ['class' => 'form-control reqiured','id'=>'sit_ups']) !!}
                                </div>
					 </div>
                     <div class="form-group">
					 <label class="col-sm-3 control-label">Pinch your flesh of abdomen, below the waist with your fore finger and thumb is it within range of 12-15 mm? Indicate measurements if aware </label>
					 <div class="col-sm-9">
					{!! Form::input('number','abdomen_fat', null, ['class' => 'form-control reqiured','id'=>'abdomen_fat']) !!}
                                </div>
					 </div>                     
                           <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Submit" id="add-user" class="btn-orange">
                                </div>
                           </div>   
                        {!! Form::close() !!}
                    </div>       
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

