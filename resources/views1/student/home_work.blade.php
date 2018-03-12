@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
 	<center><h1>Home Work</h1></center>
    	
 @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
	
                                
	
    <div class="table-responsive table">
    @if(isset($hm))
    @if(count($hm)>0)
       
            
         {!! $hm[0]->home_work !!}
         <br />
         @if($hm[0]->file!='')

         Click 
         {!! HTML::link('/'.$hm[0]->file, 'here') !!} to download home work file.
         @endif
         
         
         
    
    @else
    <h2>Home Work is not added for today.</h2>
    @endif
    @endif
    </div>
 </div>
   
 
</div>
 </div>
 
 <script type='text/javascript'>
$(document).ready(function(){

	$('#classes li a').click(function(){ 
	     var id = $(this).attr('id');
		 
		$('#class').val(id);
		
		
	});
	});
	</script>
 
@endsection
