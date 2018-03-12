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
         <a class="feedback_form btn btn-primary activeform" href="{{ url('health-medical-detail?feedback_type=diet_nutrition') }}" id="diet_nutrition">
        Diet Nutrition
        </a>
        </div>
                <br /><br /><br /> <br /><br />
  @if($user_detail[0]->diet_nutrition_filled ==1)
                 Diet Nutrition detail is already filled.
                 @else
                
                    {!! Form::open(['role' => 'form', 'url' => 'health-medical-detail' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <input type="hidden" name="feedback_type" value="diet_nutrition">       	
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Dietary Habits:</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('dietary_habits', 'Vegetable', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('dietary_habits', 'Non Vegetable',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
					
					 <div class="form-group">
					 <label class="col-sm-3 control-label">Give a rough intake/menu of your breakfast</label>
					 <div class="col-sm-9">
					{!! Form::textarea('breakfast_menu', null, ['class' => 'form-control reqiured','id'=>'breakfast_menu']) !!}
                                </div>
					 </div>
					<div class="form-group">
					 <label class="col-sm-3 control-label">How many times a day do you drink milk</label>>
					 <div class="col-sm-9">
					{!! Form::input('number','drink_milk_times', null, ['class' => 'form-control reqiured','id'=>'drink_milk_times']) !!}
                                </div>
					 </div>
					 <div class="form-group">
					 <label class="col-sm-3 control-label">What do you add to it?</label>>
					 <div class="col-sm-9">
					{!! Form::text('what_add_to_milk', null, ['class' => 'form-control reqiured','id'=>'what_add_to_milk']) !!}
                                </div>
					 </div>
					 <div class="form-group">
                            	<label class="col-sm-3 control-label">Do you take packed snack/lunch to school</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('take_packed_snack', 'Yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('take_packed_snack', 'No',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div> 
                                </div>
                    </div>
                    <div id="take_packed_snack" class="">
                    <div class="form-group">
					 <label class="col-sm-3 control-label">If yes, how often?</label>
					 	<div class="col-sm-9">
					{!! Form::text('how_often_take_packed_snack', null, ['class' => 'form-control reqiured','id'=>'how_often_take_packed_snack']) !!}
                                </div>
					 </div>
                     <div class="form-group">
					 <label class="col-sm-3 control-label">What is it usually?</label>
					 <div class="col-sm-9">
					{!! Form::textarea('usually_packed_snack', null, ['class' => 'form-control reqiured','id'=>'usually_packed_snack']) !!}
                                </div>
					 </div>	
                    </div>
                     <div class="form-group">
					 <label class="col-sm-3 control-label">How often do you eat from the canteen?</label>
					 <div class="col-sm-9">
					{!! Form::text('eat_from_cantten', null, ['class' => 'form-control reqiured','id'=>'eat_from_cantten']) !!}
                                </div>
					 </div>
                     <div class="form-group">
					 <label class="col-sm-3 control-label">Time of lunch</label>
					 <div class="col-sm-9">
					{!! Form::text('time_of_lunch', null, ['class' => 'form-control reqiured','id'=>'time_of_lunch']) !!}
                                </div>
					 </div>
                     <div class="form-group">
					 <label class="col-sm-3 control-label">Sample menu of lunch</label>
					 <div class="col-sm-9">
					{!! Form::textarea('lunch_menu', null, ['class' => 'form-control reqiured','id'=>'lunch_menu']) !!}
                                </div>
					 </div>
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">What follows lunch</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-3">
                               			 <label class="col-sm-3 control-label">Nap</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('after_lunch', 'nap', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-3">
                                     	 <label class="col-sm-3 control-label">Tuition</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('after_lunch', 'tuition',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-3">
                               			 <label class="col-sm-3 control-label">Self Study</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('after_lunch', 'self study', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-3">
                                     	 <label class="col-sm-3 control-label">Other</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('after_lunch', 'other',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
					 <label class="col-sm-3 control-label">If any other,mentioned it</label>
					 <div class="col-sm-9">
					{!! Form::text('after_lunch_other', null, ['class' => 'form-control reqiured','id'=>'after_lunch_other']) !!}
                                </div>
					 </div>
                     <div class="form-group">
					 <label class="col-sm-3 control-label">Time of dinner</label>
					 <div class="col-sm-9">
					{!! Form::text('dinner_time', null, ['class' => 'form-control reqiured','id'=>'dinner_time']) !!}
                                </div>
					 </div>
                     <div class="form-group">
					 <label class="col-sm-3 control-label">Sample menu of dinner</label>
					 <div class="col-sm-9">
					{!! Form::textarea('dinner_menu', null, ['class' => 'form-control reqiured','id'=>'dinner_menu']) !!}
                                </div>
					 </div>
                     <div class="form-group">
					 <label class="col-sm-3 control-label">At what time do you go bed?</label>
					 <div class="col-sm-9">
					{!! Form::text('sleep_time', null, ['class' => 'form-control reqiured','id'=>'sleep_time']) !!}
                                </div>
					 </div>
               		 <div class="form-group">
                            	<label class="col-sm-3 control-label">Frequency of eating out/eating take away food.</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Healthy</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('frequency_of_eating', 'healthy', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Sometimes</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('frequency_of_eating', 'sometimes',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Frequently</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('frequency_of_eating', 'frequently', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Do you drink 4-6 glass of water everyday ?</label> 
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('drink_water_daily', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('drink_water_daily', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Do you frequently consume commercially prepard Food including aerated drink, snacks,jams,Maggi soups etc. ?</label> 
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Yes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('consume_commerciall_food', 'yes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">No</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('consume_commerciall_food', 'no',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Do you eat puddings,cakes,sweets,chocolate ice-cream,candy etc.Tick the appropraite choice ?</label> 
                                <div class="col-sm-9">
                               		 <div class="col-sm-6">
                               			 <label class="col-sm-3 control-label">Sometimes</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('eat_sweet_food', 'sometimes', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-6">
                                     	 <label class="col-sm-3 control-label">Never</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('eat_sweet_food', 'never',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
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

