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
                    <h3>Add Teacher</h3>
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      {!! Form::open(['role' => 'form', 'url' => 'add-teacher' ,'id' => 'add-teacher' ,'class' => 'form-horizontal form-label-left','files' => true]) !!}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Teacher Name">Teacher Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         {!! Form::text('teacher_name', null, ['required'=>'required','placeholder' => 'Teacher Name', 'id' => 'teacher-display-name' ,'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}
                        </div>
                      </div>
                      	 <div class="form-group">
                            	<label class="col-sm-3 control-label">Password</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
					 {!! Form::password('password', ['required'=>'required','placeholder' => 'Password',  'class' => 'form-control  col-md-7 col-xs-12 reqiured']) !!}
                                </div>
                            </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       {!! Form::text('phone', null, ['required'=>'required','placeholder' => 'phone', 'id'=>'phone', 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}    
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                     {!! Form::text('email', null, ['required'=>'required','placeholder' => 'email', 'id'=>'email', 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!} 
                        </div>
                      </div>
                      <div class="form-group">
                            	<label class="col-sm-3 control-label">Gender</label>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                          <select class="form-control required" name="gender" >
						 <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        </select>
                        </div>
                        </div>
                    <div class="form-group">
                            	<label class="col-sm-3 control-label">Date of Birth</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                	{!! Form::input('date', 'birth_date', null,array('required'=>'required','placeholder'=>'Birth date', 'id'=>"birth_date" , 'class'=>"form-control reqiured col-md-7 col-xs-12" )) !!}
                                </div>
                            </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Qualification</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       {!! Form::text('qualification', null, ['required'=>'required','placeholder' => 'Qualification', 'id' => 'qualification' , 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}                          
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="Address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                        {!! Form::text('address', null, ['required'=>'required','placeholder' => 'Address', 'id' => 'address' , 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}
                    
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('city', null, ['required'=>'required','placeholder' => 'city', 'id'=>'city' , 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}
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
                        <div class="form-group ">
                            	<label class="col-sm-3 control-label">Assign Class</label>
                                <div class="col-sm-6">
                       @if (isset($classes))
					 @if (count($classes) > 0)
                                        <select class="form-control required" name="class_id" > 
                                        <option value="">Select Class</option>
					 @foreach($classes as $class)
                                           <option value="{!!$class->id!!}" > {!! ucfirst($class->class_name) !!}
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
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            
                    <!-- end form for validations -->
             
@stop
