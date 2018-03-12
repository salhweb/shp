@extends('layouts.main')
@section('content')
   <div class="content">
    	<div class="container">

	@if (Session::has('message'))
    <div class="alert alert-info  alert-dismissable">
     		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{!! Session::get('message') !!}
	</div>
@endif
	
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert  alert-dismissable'>
     		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {!! $error !!}
             </div>
        @endforeach
    @endif
          
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Add School</h3>
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   {!! Form::open(['role' => 'form', 'url' => 'add-school' ,'id' => 'add-school' ,'class' => 'form-horizontal','files' => true]) !!}
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school name">School Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('school_name', null, ['placeholder' => 'School Name', 'id'=>'school-name' , 'class' => 'form-control col-md-7 col-xs-12 reqiured' , 'reqiured'=> 'required']) !!}
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         {!! Form::text('email', null, ['placeholder' => 'Email', 'id'=>'email' , 'class' => 'form-control col-md-7 col-xs-12 reqiured' , 'reqiured'=> 'required']) !!}
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
                        {!! Form::text('phone', null, ['placeholder' => 'Phone', 'id'=>'phone' , 'class' => 'form-control col-md-7 col-xs-12 reqiured' , 'reqiured'=> 'required']) !!}
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
                         {!! Form::text('city', null, ['placeholder' => 'City', 'id'=>'email' , 'class' => 'form-control col-md-7 col-xs-12 reqiured' , 'reqiured'=> 'required']) !!}
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="Address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                         {!! Form::text('address', null, ['placeholder' => 'address', 'id'=>'address' , 'class' => 'form-control col-md-7 col-xs-12 reqiured' , 'reqiured'=> 'required']) !!}
                        </div>
                    </div>
                    </div>
                    <div class="form-group ">
                            	<label class="col-sm-3 control-label">Assign Doctor</label>
                                <div class="col-sm-6">
                       @if (isset($doct))
					 @if (count($doct) > 0)
                                        <select class="form-control required" name="doctor_id" > 
                                        <option value="">Select Nurse</option>
					 @foreach($doct as $doc)
                                           <option value="{!!$doc->id!!}" > {!! ucfirst($doc->name) !!}
                                           </option>
                                         @endforeach
                                         </select>
					@endif
                    @endif
                                </div>
                                </div>
                    <div class="form-group ">
                            	<label class="col-sm-3 control-label">Assign Nurse</label>
                                <div class="col-sm-6">
                       @if (isset($nurses))
					 @if (count($nurses) > 0)
                                        <select class="form-control required" name="nurse_id" > 
                                        <option value="">Select Nurse</option>
					 @foreach($nurses as $nurse)
                                           <option value="{!!$nurse->id!!}" > {!! ucfirst($nurse->name) !!}
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

                    </form>
                  </div>
                </div>
              </div>
            </div>
           
                    <!-- end form for validations -->
             
@stop
