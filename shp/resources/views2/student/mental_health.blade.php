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
         <a class="feedback_form btn btn-primary activeform" href="{{ url('health-medical-detail?feedback_type=mental_health') }}" id="mental_health">
        Mental Health
        </a>
        </div>
        <div class="col-sm-3" >
         <a class="feedback_form btn btn-primary" href="{{ url('health-medical-detail?feedback_type=diet_nutrition') }}" id="diet_nutrition">
        Diet Nutrition
        </a>
        </div>
                <br /><br /><br /> <br /><br />
                @if($user_detail[0]->mental_health_filled ==1)
                 Mental Health detail is already filled.
                 @else
                
                            {!! Form::open(['role' => 'form', 'url' => 'health-medical-detail' ,'id' => 'create-user' ,'class' => 'form-horizontal']) !!}

 
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <input type="hidden" name="feedback_type" value="mental_health">      
                   <div class="form-group">
                            	<label class="col-sm-3 control-label">Size of the Family</label>
                                <div class="col-sm-9">
					{!! Form::text('family_size', null, ['class' => 'form-control reqiured','id'=>'family_size']) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Position of the family</label>
                                <div class="col-sm-9">
					{!! Form::text('family_position', null, ['class' => 'form-control reqiured','id'=>'family_position']) !!}
                                </div>
                    </div> 	
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Accommodation Rental/Owned</label>
                                <div class="col-sm-9">
					{!! Form::text('accommodation', null, ['class' => 'form-control reqiured','id'=>'accommodation']) !!}
                                </div>
                    </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">No. of rooms</label>
                                <div class="col-sm-9">
					{!! Form::text('rooms', null, ['class' => 'form-control reqiured','id'=>'rooms']) !!}
                                </div>
                    </div> 
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Facility for study at home</label>
                                <div class="col-sm-9">
					{!! Form::text('study_facility', null, ['class' => 'form-control reqiured','id'=>'study_facility']) !!}
                                </div>
                    </div> 	
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Pupil lives with both the parents</label>
                                <div class="col-sm-9">
					{!! Form::text('lives_with', null, ['class' => 'form-control reqiured','id'=>'lives_with']) !!}
                                </div>
                    </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Type of family</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Nuclear</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('family_type', 'nuclear', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Joint</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_type', 'joint',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Extended</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('family_type', 'extended',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <hr />
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Behavior with parents</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Aggressive</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('behavior_with_parents', 'aggressive', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Submissive</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('behavior_with_parents', 'submissive',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Likable</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('behavior_with_parents', 'likable',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Behavior with peer group</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Leadership</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('behavior_with_peer_group', 'leadership', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Co-operative</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('behavior_with_peer_group', 'Co-operative',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Follower</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('behavior_with_peer_group', 'follower',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Leadership</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Always</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('leadership', 'always', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Somewhat</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('leadership', 'somewhat',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">None</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('leadership', 'none',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Sociability</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">High</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('sociability', 'high', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Somewhat</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('sociability', 'somewhat',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">None</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('sociability', 'none',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Initiative</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Always</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('initiative', 'always', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Somewhat</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('initiative', 'somewhat',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">None</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('initiative', 'none',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Behavior with teacher</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Takes suggestion</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('behavior_with_teacher', 'takes suggestion', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Argumentative</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('behavior_with_teacher', 'argumentative',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Disscuss</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('behavior_with_teacher', 'disscuss',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Passive</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('behavior_with_teacher', 'passive',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Personality</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Takes suggestion</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('personality', 'well behaved', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Argumentative</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('personality', 'slightly balanced',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Emotional</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('personality', 'emotional',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                     <div class="form-group">
                            	<label class="col-sm-3 control-label">Attendance</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Very Regular</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('attendance', 'very regular', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Often regular</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('attendance', 'often regular',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 	<div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Irregular</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('attendance', 'irregular',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                	</div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Obedience</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Always obedient</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('obedience', 'always obedient', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Sometimes</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('obedience', 'sometimes',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 	<div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Rarely obedient</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('obedience', 'rarely obedient',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                	</div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Responsibility</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">High</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('responsibility', 'high', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Slightly</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('responsibility', 'slightly',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 	<div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Irregular</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('responsibility', 'irregular',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                	</div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Industry</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Hardworking</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('industry', 'hardworking', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Average</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('industry', 'average',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 	<div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Careless</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('industry', 'careless',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                	</div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Home Work</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Regular</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('home_work', 'regular', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Irregular</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('home_work', 'irregular',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 	<div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Does not do HW</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('home_work', 'Does not do HW',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                	</div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Self Confidence</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Always</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('self_confidence', 'always', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Often</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('self_confidence', 'often',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 	<div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Seldom co-opperative</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('self_confidence', 'seldom_co-opperative',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                	</div>
                                </div>
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Personal Appearance</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-4">
                               			 <label class="col-sm-3 control-label">Neatly dressed</label>
                               			 <div class="col-sm-9">
                                {!! Form::radio('personal_appearance', 'neatly_dressed', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Seldom</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('personal_appearance', 'seldom',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                 	<div class="col-sm-4">
                                     	 <label class="col-sm-3 control-label">Never</label>
                              			 <div class="col-sm-9">
								{!! Form::radio('personal_appearance', 'never',false,['class' =>'form-control reqiured']) !!}
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

