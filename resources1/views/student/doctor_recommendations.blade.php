@extends('layouts.main')
@section('content')
   
   <div class="content">
    	<div class="container">
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
 	<center><h1>Doctor Recommendations</h1></center>
    	
 @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
	
                                
	
    <div class="table-responsive table">
   <? //php print_r($user_details);

 if(isset($user_details))
{ 

foreach($user_details as $user_detail) {?>

<div class="col-md-6">
<table border="2">
<h3>Diet & Nutrition Recommendations  </h3>
<tr><td> <h4>Title</h4></td><td> <h4>Diet & Nutrition Recommendations</h4> </td> <td><h4>Date</h4></td></tr>
<tr><td><?php echo $user_detail->diet_subject; ?></td><td><?php echo $user_detail->diet_recommendation; ?></td><td> <?php echo $user_detail->updated_on; ?></td></tr>

</table>
</div>

<div class="col-md-6">
<table border="2">
<h3>Mental Health</h3>
<tr><td> <h4>Title</h4></td><td> <h4>Mental Health Recommendations</h4> </td> <td><h4>Date</h4></td></tr>
<tr><td><?php echo $user_detail->mental_subject; ?></td><td><?php echo $user_detail->mental_recommendation; ?></td> <td> <?php echo $user_detail->updated_on; ?></td></tr>


</table>
</div>

<?php } 
}
?>
    </div>
 </div>
   
 
</div>
 </div>
 
<style>
h3,h2,h4 { color:#fff;}
td, th {
    padding: 10px 10px 10px 10px;
color:#fff;
    font-size: 18px;
}
table {color:#fff; border-color: rgba(245, 245, 245, 0.41);
} }
</style>

 <script type='text/javascript'>
$(document).ready(function(){

	$('#classes li a').click(function(){ 
	     var id = $(this).attr('id');
		 
		$('#class').val(id);
		
		
	});
	});
	</script>
 
@endsection
