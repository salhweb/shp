@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
 	<center><h1>Students</h1></center>
     @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
		
       
        {!! Form::open(['method'=>'get']) !!}

<div class="form-group col-md-3">

    {!! Form::text('user_keyword', app('request')->input('user_keyword'), ['placeholder' => 'Search Name','class' => 'form-control']) !!}
    {!! Form::hidden('user_search',1) !!}
</div>
<div class="form-group col-md-2">
{!! Form::submit('Search Users', ['class' => 'btn  btn-primary']) !!}
</div>
<div class="form-group col-md-2">
<a class = 'btn  btn-danger' href='{!! URL::to('students') !!}'>Reset Filters</a>
</div>
{!! Form::close() !!}
                                   
	
    <div class="table-responsive table">
    @if(isset($users))
     <?php echo $users->appends(Input::except('page'))->render(); ?>
    @if(count($users)>0)
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Username</th>
                     <th width="10%">Class</th>                  
                    
                </tr>
            </thead>
 
            <tbody>
            
                @foreach ($users as $user)
                <tr>
                     <td><a href="{!! URL::to('student/'. $user->student_id) !!}">{!! $user->student_id !!}</a></td>
                    <td>{!! $user->name !!}</td>
                  
                  <td> @if(isset($user->class_name))   {!!  $user->class_name !!} @endif</td>

 
                </tr>
                @endforeach
            </tbody>
 
        </table>
       <?php echo $users->appends(Input::except('page'))->render(); ?>
    @else
    <h2>No results found for your search</h2>
    @endif
    @endif
    </div>
 </div>
   
 
</div>
 </div>
 <script type="text/javascript">
 $(document).ready(function(){
	 $('#user_type').change(function() {
		 if($(this).val()==5)
		 {
			 $('.select_schools').removeClass('hide');
		 }
		 else
		 {
			  $('.select_schools').addClass('hide');
			  $('#school').val('');

		 }
	 });
 });
 </script>
@endsection
