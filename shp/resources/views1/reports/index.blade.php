@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
 	<center><h1>STUDENTS</h1></center>
    	
 @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
	 <div id="temps_div"></div>
// With Lava class alias
<?= Lava::render('GaugeChart', 'Temps', 'temps_div') ?>

// With Blade Templates
@gaugechart('Temps', 'temps_div')
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
