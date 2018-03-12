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
                <h3>Nurses</h3>
              </div>
              <div class="form-group col-md-2 pull-right">
<a href="{{url('add-nurse')}}" ><input class="btn  btn-primary" value="Add Nurse" type="submit">
</a></div>
             
 </div>
            <div class="clearfix"></div>
            <div class="row"> 
              <div class="col-md-12 col-sm-12 col-xs-12">
                  
                <div class="x_panel">
            <div class="x_title">
                    <h2>Filter Nurses Details</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                
                  <div class="x_content">
                    <br />
					<div class="row">
                    {!! Form::open(['url' => 'nurses','method'=>'get','class'=>'form-horizontal form-label-left']) !!}
                        <div class="col-md-2 col-sm-3 col-xs-12 form-group">
                          <select class="form-control" name="school">
                           <option>School</option>
                          @foreach($schools as $school)
                            <option value="{{$school->id}}">{{$school->name}}</option>
                            @endforeach
                          </select>
                       
                      </div>	
				
                        <div class="col-md-2 col-sm-3 col-xs-12 form-group">
                          <input type="text" class="form-control" name="nurse_name" placeholder="Name">
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
			
			<div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="x_panel">
				
					  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Nurses Listing 
                    </p>
                    
                    <table id="datatable" class="table table-striped table-bordered">
                     @if(isset($nurses))
     <?php // echo $teachers->appends(Input::except('page'))->render(); ?>
     @if(count($nurses)>0)
                      <thead>
                        <tr>
						<th>S/no</th>
                          <th>Name</th>
                          <th>Qualification</th>
                          <th>Contact</th>
                          <th>Address</th>
                          <th>Assigned to School</th>
						  <th>Edit</th>
						  <th>View</th>
						  
						  <th><input type="checkbox" id="check-all" class="flat"></th>
                        </tr>
                      </thead>


                      <tbody>
                      @foreach($nurses as $sno => $nurse)
                        <tr>
						<td>{{$sno+1}}</td>
                          <td>{{$nurse->name}}</td>
                          <td>{{$nurse->education}}</td>
                          <td>{{$nurse->email}}</td>
                          <td>{{$nurse->address}},{{$nurse->city}},{{$nurse->state}}</td>
                          <td>{{$nurse->school_id}}</td>
                          <td><a href={{url('nurse/'.$nurse->nurse_id.'/edit')}}>Edit</a></td>
                          <td><a href="#">Active</a></td>
						  <td><input type="checkbox" id="check-all" class="flat"></td>
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
              </div>
			  </div>
			 
 
@stop
