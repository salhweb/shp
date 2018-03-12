@extends('layouts.master_email')   
@section('content')          
                <tr>
                                 <td height="23" colspan="2"  style=" font-weight:bold;padding:8px;font-size:13px;
                                 font-family:Verdana, Geneva, sans-serif;border-bottom:#eae9ea solid 1px;background-color:#f1f1f1">
                                KwikeMarket - New enquiry from contact us form.
                                </td> 
                            </tr> 
                            <tr>
                                <td colspan="2" style="padding-left:12px;padding-right:12px;font-family:Verdana, Geneva, sans-serif;font-size:13px"><br> Hi Admin,<br><br> As a
                                Following information is submitted on the kwikemarket website:<br/><br/>

Name: {{ $name }}<br/>
Email: {{ $email }}<br/>
Subject: {{ $subject }}<br/><br/>
Message: {{ $message_content }}<br/><br>
                                Thanks<br> Team <span class="il">Kwikemarket</span><br> <a href="http://www.Kwikemarket.com" target="_blank">www.<span class="il">Kwikemarket</span>.com</a> 
                                
                                <br><br> 
                                </td>
                            </tr> 
@stop





