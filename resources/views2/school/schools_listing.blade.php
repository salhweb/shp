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
    
            <div class="page-title">
              <div class="title_left">
                <h3>Schools </h3>
              </div>
              <div class="form-group col-md-2 pull-right">
<a href="{{url('add-school')}}" ><input class="btn  btn-primary" value="Add School" type="submit">
</a></div>
 </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Filter</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
					<div class="row">
                    
                    {!! Form::open(['url' => 'schools','method'=>'get','class'=>'form-horizontal form-label-left']) !!}
                    
                   
					
                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <?php $indian_states = Session::get('indian_states'); ?>
                          <select class="form-control required" name="state" reuired="required">
						 <option value="">Select State</option>
                             @foreach($indian_states as $state_abr => $state)
                       <option value="{{$state_abr}}">{{$state}}</option>
                       @endforeach 
         
							</select>
                        </div>
                         <div class="col-md-2 col-sm-3 col-xs-12 form-group">
 						 <input type="text" class="form-control" placeholder="City" name="city" id="city">
					     
                       </div>	
				
                      <div class="col-md-2 col-sm-3 col-xs-12 form-group">
 						<input type="text" class="form-control" placeholder="Name" city="city" id="city">
					     </div>
                       
             		   <div class="col-md-2 col-sm-3 col-xs-12  form-group">
                          
                          <button type="submit" class="btn btn-success">Search</button>
                        </div>
      {!! Form::close() !!}
                    
					</div>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="x_panel">
				
					  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
@if(isset($schools))
     <?php // echo $teachers->appends(Input::except('page'))->render(); ?>
    @if(count($schools)>0)
                      <thead>
                        <tr>
			<th>S/no</th>
                          <th>School Name</th>
                          <th>Phone</th>
                          <th> City</th>
                          <th>State</th>
                          <th> Address</th>
                           <th>Edit</th>
                        </tr>
                      </thead>


                      <tbody>
 @foreach ($schools as $key => $school)
                        <tr>
			<td>{{$key+1}}</td>
                          <td>{!! $school->name !!}</td>
                          <td>{!! $school->phone !!}</td>
                          <td>{!! $school->city !!}</td>
                          <td>{!! $school->state !!}</td>
                           <td>{!! $school->address !!}</td>
                          <td><a href={{url('schools/'.$school->school_id.'/edit')}}>Edit</a></td>
                          <!--<td><a href="#">Active</a></td>-->
                        </tr>
                        @endforeach
                      </tbody>
            <?php //echo $teacher->appends(Input::except('page'))->render(); ?>
    @else
    <h2>No results found for your search</h2>
    @endif
    @endif
                    </table>
                  </div>
                </div>
             

 
@stop
