@extends('layouts.main')
@section('content')

            <div class="page-title">
              <div class="title_left">
                <h3>Doctors Listing </h3>
              </div>
		  
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Doctors Detials</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<div class="row">
                    {!! Form::open(['url' => 'doctors','method'=>'get','class'=>'form-horizontal form-label-left']) !!}
                    <!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
					<div class="col-md-2 col-sm-3 col-xs-12 form-group">
                          <select class="form-control" name="school_id">
                            <option value="">Select School</option>
                            @foreach($schools as $school)
                            	 <option value="{{$school->id}}">{{$school->name}}</option>
                            @endforeach
                          </select>
      
                      </div> 
				
                        <div class="col-md-2 col-sm-3 col-xs-12 form-group">
                          <select class="form-control" name="doctor_type">
                          <option value="">Select Speciality</option>
                            @foreach($doctor_types as $doctor_type)
                            <option value="{{$doctor_type->id}}">{{$doctor_type->type}}</option>
                            @endforeach
                          </select>
                       
                      </div>	
				
                        <div class="col-md-2 col-sm-3 col-xs-12 form-group">
                          <input type="text" class="form-control" name="doctor_name" placeholder="Name">
                        </div>
                      	

					
                        

                      
                        <div class="col-md-2 col-sm-3 col-xs-12  form-group">
                          
                          <button type="submit" class="btn btn-success">Search</button>
                        </div>
                      

                    </form>
					</div>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="x_panel">
				
					  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Doctor Listing 
                    </p>
                    
                    <table id="datatable" class="table table-striped table-bordered">
                    @if(isset($doctors))
     <?php // echo $teachers->appends(Input::except('page'))->render(); ?>
     @if(count($doctors)>0)
                      <thead>
                        <tr>
						<th>S/no</th>
                          <th>Doctor Name</th>
                          <th>Speciality</th>
                          <th>Assign Schools</th>
                          <th>Qualification</th>
						  <th>Contact</th>
						  <th>Address</th>
						  <th>Edit</th>
						  <th>View</th>
						  
						  <th><input type="checkbox" id="check-all" class="flat"></th>
                        </tr>
                      </thead>


                      <tbody>
                   
                      @foreach($doctors as $sno => $doctor)
                        <tr>
						<td>{{$sno+1}}</td>
                          <td>{{$doctor->name}}</td>
                          <td>{{$doctor->type}}</td>
                          <td>{{$doctor->school_name}}</td>
                          <td>{{$doctor->education}}</td>
						  <td>{{$doctor->email}}</td>
						  <td>{{$doctor->address}}</td>
                          <td><a href={{url('doctor/'.$doctor->id.'/edit')}}>Edit</a></td>
                          <td><a href="#">Active</a></td>
						  <td><input type="checkbox" id="check-all" class="flat"></td>
                        </tr>
                         @endforeach
                        
                      </tbody>
                    </table>
                     <?php //echo $teacher->appends(Input::except('page'))->render(); ?>
                     @else
    <h2>No results found for your search</h2>
    @endif
    @endif
                  </div>
                </div>
              </div>
			  
			  
@endsection

