@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
		{!! HTML::ul($errors->all()) !!}
		<div class="flash-message">
  		  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    			  @if(Session::has('alert-' . $msg))

	    			  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
     			 @endif
  		  @endforeach
  		</div> <!-- end .flash-message -->
	
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
			{!! Form::open(['url' => 'department_types/create','method'=>'post','files' => true,'class'=>'form-horizontal']) !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	
                        	<div class="form-group">
                            	<label class="col-sm-2 control-label">Department Type</label>
                                <div class="col-sm-10">
					{!! Form::text('department_name', null,array('placeholder'=>'', 'id'=>"user_name" , 'class'=>"form-control" )) !!}
                                </div>
                            </div>
                           <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Add Department Type" class=" btn-orange">
                                </div>
                           </div>   
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

