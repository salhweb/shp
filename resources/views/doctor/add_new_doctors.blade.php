@extends('layouts.main')
@section('content')
   <div class="content">
    	<div class="container">

	
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{!! $error !!}</div>
        @endforeach
    @endif
  
          
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Add New Doctors</h3>
                    {!! HTML::ul($errors->all()) !!}
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                  
                  
{!! Form::open(['role' => 'form', 'url' => 'add-doctor' ,'id' => 'add-doctor' ,'class' => 'form-horizontal form-label-left','files' => true]) !!}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Doctor Name">Doctor Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('doctorname', null, ['placeholder' => 'Doctor Name', 'id'=>'doctor-name' , 'class' => 'form-control col-md-7 col-xs-12 reqiured' , 'reqiured'=> 'required']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                     {!! Form::text('email', null, ['required'=>'required','placeholder' => 'email', 'id'=>'email', 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!} 
                        </div>
                      </div>
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Password</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
					 {!! Form::password('password', ['required'=>'required','placeholder' => 'Password',  'class' => 'form-control  col-md-7 col-xs-12 reqiured']) !!}
                                </div>
                            </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone no</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                          {!! Form::text('phone', null, ['placeholder' => 'Phone no', 'id'=>'display-doctor-name' , 'class' => 'form-control col-md-7 col-xs-12 reqiured' , 'reqiured'=> 'required']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9">
                               		 <div class="col-sm-3">
                               			 <label class="col-sm-3 control-label">Male</label>
                               			 <div class="col-sm-3">
                                {!! Form::radio('gender', 'male', false,['class' =>'form-control reqiured']) !!}
                               			 </div>
                                	</div>
                               		 <div class="col-sm-3">
                                     	 <label class="col-sm-3 control-label">Female</label>
                              			 <div class="col-sm-3">
								{!! Form::radio('gender', 'female',false,['class' =>'form-control reqiured']) !!}
                                		</div>
                                </div>
                                </div>
                    </div>
                 
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Date of Birth</label>
                                <div class="col-sm-6">
                                	{!! Form::input('birth_date', 'birth_date', null,array('placeholder'=>'Birth date', 'id'=>"birth_date" , 'class'=>"form-control reqiured" )) !!}
                                </div>
                            </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php $indian_states = Session::get('indian_states'); ?>
                          <select class="form-control required" name="state" reuired="required">
						 <option value="">Select State</option>
                             @foreach($indian_states as $state_abr => $state)
                       <option value="{{$state_abr}}">{{$state}}</option>
                       @endforeach 
         
							</select>
                        </div></br>
						</div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
              
						{!! Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="Address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                     {!! Form::textarea('address', null, array('placeholder'=>'Address', 'id'=>"address",'class'=>'resizable_textarea form-control reqiured'), ['size' => '25x4']) !!}
                    </div>
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Education qualification</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      {!! Form::text('education', null, ['placeholder' => 'Education qualification', 'id'=> 'education', 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!} 
                        </div>
                      </div>
                      <div class="form-group ">
                            	<label class="col-sm-3 control-label">Doctor Type</label>
                                <div class="col-sm-6">
                       @if (isset($doctype))
                     @if (count($doctype) > 0)
                                        <select class="form-control required" name="doctor_type" > 
                                        <option value="">Doctor Type</option>
					 @foreach($doctype as $doc)
                                           <option value="{!!$doc->id!!}" > {!! ucfirst($doc->type) !!}
                                           </option>
                                         @endforeach
                                         </select>
					@endif
                    @endif
                                </div>
                                </div>
       				<div class="form-group ">
                            	<label class="col-sm-3 control-label">Assign School</label>
                                <div class="col-sm-6">
                       @if (isset($schools))
                     @if (count($schools) > 0)
                                        <select class="form-control required" name="school_id" > 
                                        <option value="">Select School</option>
					 @foreach($schools as $school)
                                           <option value="{!!$school->id!!}" > {!! ucfirst($school->name) !!}
                                           </option>
                                         @endforeach
                                         </select>
					@endif
                    @endif
                                </div>
                                </div>
                                <div class="well">
                           	<label>Profile Picture</label>
                            	<div class="row">                               	
                                    
                                </div>
			{!! Form::file('userpic',array('class'=>'form-control')) !!}
                           </div>
					   
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      </form>

                   {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            
                    <!-- end form for validations -->
             
@stop
