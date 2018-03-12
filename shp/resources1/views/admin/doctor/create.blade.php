@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
            <div class="task-form">
            	<div class="row">
                	<div class="col-sm-offset-1 col-md-9">
			{!! Form::open(['url' => 'departments/create','method'=>'post','files' => true,'class'=>'form-horizontal']) !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	
                        	<div class="form-group">
                            	<label class="col-sm-2 control-label">Team Person</label>
                                <div class="col-sm-10">
					{!! Form::text('user_name', null,array('placeholder'=>'', 'id'=>"user_name" , 'class'=>"form-control auto-suggest" )) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="text" class="form-control" id="inputtitle" placeholder="Task title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                	<textarea rows="4" cols="25" placeholder="Description"></textarea>
                                </div>
                            </div>
                        	<div class="form-group">
                            	<label class="col-sm-2 control-label">Project</label>
                                <div class="col-sm-10">
                                	<div class="btn-group btn-group1">
                                         <button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Project</button>
                                         <ul class="dropdown-menu dropdown-menu1" role="menu">
                                           <li class="ool"><a tabindex="-1" href="#"><span class="badge">OOl</span> Brecon - Development</a></li>
                                           <li class="ool"><a tabindex="-1" href="#"><span class="badge">OOl</span> Shs - Development</a></li>
                                           <li class="dp"><a tabindex="-1" href="#"><span class="badge">DP</span> Flex Fitness - Development</a></li>
                                         </ul>
                                     </div>
                                </div>
                           </div>
                           <div class="well">
                           	<label>Attach files</label>
                            	<div class="row">
                                	<div class="col-sm-3">
                                    	<a class="doc" href="#">Requirements</a>
                                    </div>
                                    <div class="col-sm-3">
                                    	<a class="csv pull-left" href="#">mailing list</a>
                                        <a class="add pull-right" href="#">{!!HTML::image('/assets/images/plus.png') !!}</a>
                                        <div class="break"></div>
                                    </div>
                                </div>
                           </div>
                           <div class="form-group">
                                <div class="col-sm-12">
                                	<input type="submit" value="Add task" class=" btn-orange">
                                </div>
                           </div>   
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
$(document).ready(function(){
$('#user_name').autocomplete({
		 minLength:1,
		 autoFocus:true,
		 source: '{{URL('tasks/getusers')}}',
		
		onSelect: function (suggestion) { 
          }
	});
});
</script>
@endsection

