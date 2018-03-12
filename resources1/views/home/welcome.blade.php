@extends('layouts.main')
@section('content')  
   <div class="content">
<style>
.h1, .h2, .h3, h1, h2, h3, h4 {
    color: #fff;
    margin-bottom: 10px;
    margin-top: 20px;
}
.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 0 solid #fff;color: #fff;

}

.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #008BCC;
}
.table-striped>tbody>tr:nth-of-type(even) {
    background-color: #E10888;
}

</style>

    	<div class="container">
            <div class="task-form">   
	@if(Auth::guest())
		<div class="row">
                	<div class="col-sm-offset-1 col-md-9"> 
			   <form method="POST" action="{{ url('login') }}" class="form-horizontal">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}">
				        <h1 title="Enter your login information">Enter your login information</h1>
			@if($errors->all())
			<div class="alert alert-danger">
			@foreach($errors->all() as $error)
			    <p>{{ $error }}</p>
			@endforeach
			 </div>
			@endif
			      <div class="form-group">
                                <div class="col-sm-12">
                        {!! Form::text('email', old('email'), array('placeholder'=>'Email Address', 'class'=>"form-control")) !!}
                         </div>
			 </div>
			     <div class="form-group">
                                <div class="col-sm-12">
			{!! Form::password('password', ['placeholder'=>'Password']) !!}
			   </div>
			 </div>
			      <div class="form-group">
                                <div class="col-sm-12">
                       {!! Form::submit('Login', ['class' => 'btn-orange']) !!}
				</div>
			</div>
                        <div><a href="{{ url('/password/email') }}" class="plain text-uppercase">Forget your password?</a></div>
                    </form>
<!--			<h2> Don't have account?</h2> <a href="{{ url('/register') }}" class="btn">Register</a>
-->                    </div>
	@else
		@if(Auth::user())
       
        <div class="row">
  
			
            <div class="col-md-2">  
            @if(Auth::user()->pic !='')
            	<img class"img-responsive img" src="storage/user_pics/{{Auth::user()->pic}}"  alt="{{ ucfirst(trans(Auth::user()->name)) }}" style="max-width:100%;" />
            @else
            	<img class"img-responsive " src="storage/user_pics/default.png"  alt="{{ ucfirst(trans(Auth::user()->name)) }}" style="max-width:100%;" />
            @endif
            </div>
           <div class="col-md-3">
               <h3> Welcome {{ ucfirst(trans(Auth::user()->name)) }} </h3>	
           @if(Auth::user()->hasRole('student'))
                   


               <table class="table table-bordered table-striped">
           <tr>
           <td>Name</td><td>{{ ucfirst($user_detail[0]->name) }}</td>
           </tr>
           <tr>
           <td>Father’s Name</td><td>{{ ucfirst($user_detail[0]->father_name) }}</td>
           </tr>
           <tr>
           <td>Address</td><td>{{ $user_detail[0]->address }}</td>
           </tr>
           <tr>
           <td>Contact Number:</td><td>{{ $user_detail[0]->phone_no }}</td>
           </tr>
           
<?php if($user_detail[0]->birth_date!='0000-00-00')
      {
          $dob=$user_detail[0]->birth_date;
    $diff = (date('Y') - date('Y',strtotime($dob)));
   
     ?>    <tr>
           <td>Age</td><td><?php echo $diff; ?> Yr</td>   
           </tr>
   <?php } ?>
           <td>Blood Group</td><td>B+</td>  
           </tr>
           </table>
            <div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
  aria-valuenow="{{ $overall_health_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $overall_health_percentage }}%">
  Health Score {{ $overall_health_percentage }}% 
  </div>
</div>
           </div>
@if(isset($user_basic_detail))
<?php // print_r($user_basic_detail); ?>
@endif
 <div class="col-md-3">
               <table class="table table-bordered table-striped">
                <h3>Health Managment Program</h3>
                <h4>Risk Factors<h4>
		<?php if(count($user_basic_detail)>0)
		{ ?>
           <tr>

	
		<td>Well being</td><td><?php echo $user_basic_detail[0]->risk_factors_well_being; ?></td>
</tr>
<tr>
		
		<td>Sleep</td><td><?php echo $user_basic_detail[0]->risk_factors_sleep; ?></td>
</tr>
<tr>
		<td>Physical Fitness</td><td> <?php echo $user_basic_detail[0]->risk_factors_physical_fitness; ?></td>
		
</tr>
<tr>
		<td>Smoking</td><td> <?php echo $user_basic_detail[0]->risk_factors_smoking; ?></td>
		
</tr>
<tr>
		<td>Alcohol</td><td> <?php echo $user_basic_detail[0]->risk_factors_alcohol; ?></td>
		
</tr>
<tr>
		<td>Tobacco</td><td> <?php echo $user_basic_detail[0]->risk_factors_tobacco; ?></td>
		
</tr>
<tr>
		<td>Occupational Risk</td><td> <?php echo $user_basic_detail[0]->risk_factors_occupational_risk; ?></td>
		
</tr>
<tr>
		<td>Respiracory Health</td><td> <?php echo $user_basic_detail[0]->risk_factors_respiratory_health; ?></td>
		
</tr>
<tr>
		<td>Digestive Health</td><td> <?php echo $user_basic_detail[0]->risk_factors_digestive_health; ?></td>
		
</tr>
<tr>
		<td>Musco skeletal</td><td> <?php echo $user_basic_detail[0]->risk_factors_muscoskeletal; ?></td>
		
</tr>
<tr>
		<td>Heart Health</td><td> <?php echo $user_basic_detail[0]->risk_factors_heart_health; ?></td>
		
</tr>
<tr>
		<td>Diatetes </td><td> <?php echo $user_basic_detail[0]->risk_factors_diabetes; ?></td>
		
</tr>
	<?php } ?>
</table>
</div>

<div class="col-md-3">
               <table class="table table-bordered table-striped">
                <h3>Medical Snapshort</h3>
                <h4>ALLERGIES</h4>
		<?php if(count($user_basic_detail)>0)
		{ ?>
           <tr>

		<td>Allergies:</td><td> <?php echo $user_basic_detail[0]->medical_snapshot_allergies; ?></td>
		
</tr>

	<?php } ?>
</table>
<hr>
</div>

<div class="col-md-3">
<h4>Membership Details<h4>
               <table class="table table-bordered table-striped">
                
		<?php if(count($user_basic_detail)>0)
		{ ?>
           <tr>

		<td>Membership Type </td><td> <?php echo $user_basic_detail[0]->important_info_membership_type; ?></td>
		
</tr>
 <tr>

		<td>Primary Clinic </td><td> <?php echo $user_basic_detail[0]->important_info_primary_clinic; ?></td>
		
</tr>
 <tr>

		<td>Primary Doctor</td><td> <?php echo $user_basic_detail[0]->important_info_primary_doctor; ?></td>
		
</tr>
 <tr>

		<td>Last Visit</td><td> <?php echo $user_basic_detail[0]->checkup_date; ?></td>
		
</tr>

	<?php } ?>
</table>
</div>

	   @endif		 
		@endif
	@endif
  
                </div>
            </div>
        </div>
    </div>
</div>

@stop