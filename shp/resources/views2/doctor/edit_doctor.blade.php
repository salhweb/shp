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
                    <h3>Edit Teacher</h3>
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      {!! Form::open(['role' => 'form', 'url' => 'doctor/update' ,'id' => 'add-doctor' ,'class' => 'form-horizontal form-label-left','files' => true]) !!}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Teacher Name">Teacher Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         {!! Form::text('doctorname', $doctor[0]->name, ['required'=>'required','placeholder' => 'Teacher Name', 'id' => 'teacher-display-name' ,'class' => 'form-control col-md-7 col-xs-12 reqiured ']) !!}
                        </div>
                      </div>
                      	 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       {!! Form::text('phone', $doctor[0]->phone, ['required'=>'required','placeholder' => 'phone', 'id'=>'phone', 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}    
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                     {!! Form::text('email', $doctor[0]->email , ['required'=>'required','placeholder' => 'email', 'id'=>'email', 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!} 
                        </div>
                      </div>
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Gender</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control required" name="gender" >
						 <option value="">Select Gender</option>
                        <option @if($doctor[0]->gender =='male') selected @endif value="male">Male</option>
                        <option @if($doctor[0]->gender =='female') selected @endif value="female">Female</option>
                        </select>
                        </div>
                                
                    </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Date of Birth</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                	{!! Form::input('date', 'birth_date', $doctor[0]->birth_date ,array('required'=>'required','placeholder'=>'Birth date', 'id'=>"birth_date" , 'class'=>"form-control reqiured col-md-7 col-xs-12" )) !!}
                                </div>
                            </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Qualification</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       {!! Form::text('education', $doctor[0]->education, ['required'=>'required','placeholder' => 'Qualification', 'id' => 'education' , 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}                          
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="Address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                        {!! Form::text('address', $doctor[0]->address, ['required'=>'required','placeholder' => 'Address', 'id' => 'address' , 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}
                    
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('city', $doctor[0]->city, ['required'=>'required','placeholder' => 'city', 'id'=>'city' , 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php $indian_states = Session::get('indian_states'); ?>
                          <select class="form-control required" name="state" reuired="required">
						 <option value="">Select State</option>
                             @foreach($indian_states as $state_abr => $state)
                       <option value="{{$state_abr}}" @if($doctor[0]->state == $state_abr) selected @endif >{{$state}}</option>
                       @endforeach 
         
							</select>
                        </div></br>
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
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input type="hidden" name="doctor_id" value="{{$doctor[0]->doctor_id}}" />
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            
                    <!-- end form for validations -->
             
@stop
