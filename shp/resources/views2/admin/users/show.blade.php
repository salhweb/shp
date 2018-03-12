@extends('layouts.main')
@section('content')
   <div class="content">
    	<div class="container">
<div class="row-fluid inner-nav">
<div class='col-lg-4 col-lg-offset-4'>

	
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{!! $error !!}</div>
        @endforeach
    @endif
    @if(isset($user_detail))
 <table class="table table-borderd">
 @foreach($user_detail as $user)
 <tr> <img style="border:4px solid #117CC1; width:300px; text-align:center; margin:0 auto;" class"img-rounded" src="/storage/user_pics/{{$user->pic}}"  alt="{{$user->name}}"/></tr>
 <tr><td>Name:</td><td>{{$user->name}}</td></tr>
 <tr><td>Email:</td><td>{{$user->email}}</td></tr>
  <tr><td>Class:</td><td>{{$user->class_name}}</td></tr>
<tr><td>D.O.B.:</td><td>{{$user->birth_date}}</td></tr>
  <tr><td>Gender:</td><td>{{$user->gender}}</td></tr>
 <tr><td>Father Name:</td><td>{{$user->father_name}}</td></tr>
  <tr><td>Mother Name:</td><td>{{$user->mother_name}}</td></tr>

 <tr><td>Phone Number:</td><td>{{$user->phone_no}}</td></tr>
  <tr><td>Address:</td><td>{{$user->address}}</td></tr>


 @endforeach
  </table>
 @endif
</div>
 
@stop
