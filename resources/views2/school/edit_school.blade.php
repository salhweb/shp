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
                      {!! Form::open(['role' => 'form', 'url' => 'schools/update' ,'id' => 'add-school' ,'class' => 'form-horizontal form-label-left','files' => true]) !!}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Teacher Name">School Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         {!! Form::text('school_name', $school[0]->name, ['required'=>'required','placeholder' => 'Nurse Name', 'id' => 'teacher-display-name' ,'class' => 'form-control col-md-7 col-xs-12 reqiured ']) !!}
                        </div>
                      </div>
                      	 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       {!! Form::text('phone', $school[0]->phone, ['required'=>'required','placeholder' => 'phone', 'id'=>'phone', 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}    
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                     {!! Form::text('email', $school[0]->email , ['required'=>'required','placeholder' => 'email', 'id'=>'email', 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!} 
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                        {!! Form::text('address', $school[0]->address, ['required'=>'required','placeholder' => 'Address', 'id' => 'address' , 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}
                    
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('city', $school[0]->city, ['required'=>'required','placeholder' => 'city', 'id'=>'city' , 'class' => 'form-control col-md-7 col-xs-12 reqiured']) !!}
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php $indian_states = Session::get('indian_states'); ?>
                          <select class="form-control required" name="state" reuired="required">
						 <option value="">Select State</option>
                             @foreach($indian_states as $state_abr => $state)
                       <option value="{{$state_abr}}" @if($school[0]->state == $state_abr) selected @endif >{{$state}}</option>
                       @endforeach 
         
							</select>
                        </div></br>
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
                        <input type="hidden" name="school_id" value="{{$school[0]->school_id}}" />
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
