<?php
namespace App\Http\Controllers\Admin;
use DB;
use View;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;
use Auth;
use Input;
use App\User;
use Hash;
use Session;
use Redirect;
use Paginator;
use Show;
use QrCode;
use PDF;
use Config;


//db-name
use wellokid;
use App\Http\Controllers\Controller;

class UserAdminController extends Controller {

	

    public function __construct()
    {
		if(Auth::user()!=null && (Auth::user()->hasRole('administrator')))
	{
	}
	else
	{
		echo'Invalid Access'; exit;
	}
    }
 



/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$query = DB::table('users')->select('users.*','user_roles.role')->join('user_roles','user_roles.id','=','users.user_role');
		if(Input::get('user_type') !=""){
			if(Input::get('user_type')==5)
			{
				$query1 = DB::table('users')->select('users.*','user_roles.role','classes.class_name')->join('user_roles','user_roles.id','=','users.user_role');
				$query= $query1->join('student_details','student_details.student_id','=','users.id')->join('classes','classes.id','=','student_details.class_id');
				if(Input::get('class_id') !=""){
					$query= $query->where('student_details.class_id','=',Input::get('class_id'));
				}
				if(Input::get('school') !=""){
					$query= $query->where('student_details.school_id','=',Input::get('school'));
				}
			}
			
			$query = $query->where('users.user_role', '=', Input::get('user_type'));
			
		}
		else
		{
		$query = $query->where('users.user_role', '!=', '1');
		}
		if(Input::get('user_keyword') !=""){ 
		$query = $query->where('name', 'LIKE', '%'.Input::get('user_keyword').'%');
		}
		
	//	$queryStr = array_except( Input::query(), Paginator::getPageName() );
	//	$users = $query->paginate(50)->appends($queryStr);		 simplePaginate
		$users = $query->simplePaginate(50);
		 
		$stSql="SELECT * FROM user_roles WHERE id!=1";
	    $user_roles=DB::select(DB::raw($stSql));
		$stSql1="SELECT id, name FROM users WHERE user_role=4";
		$schools=DB::select(DB::raw($stSql1));
 	         return View::make('admin/users.index', array('users' => $users , 'user_roles'=>$user_roles,'schools'=>$schools));
	

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()!=null && (Auth::user()->hasRole('administrator')))
	{
	$stSql="SELECT * FROM user_roles WHERE id!=1";
	$user_roles=DB::select(DB::raw($stSql));
	
	$docSql="SELECT * FROM doctor_types";
	$doctor_types=DB::select(DB::raw($docSql));
	
	$userSql="SELECT id,  name ,user_role FROM users WHERE user_role=2 OR user_role=3 OR user_role=4";
	$users=DB::select(DB::raw($userSql));
	
	$class_query = DB::table('classes')->select('*');
	    $classes=$class_query->get();
	$section_query = DB::table('class_sections')->select('*');
	$sections=$section_query->get();
	
        return View::make('admin/users.create', array('user_roles' => $user_roles,'doctor_types' => $doctor_types, 'users' => $users,'classes' => $classes,'sections'=>$sections));
	}
	else
	{
	echo 'Invalid Access.';		
	exit;
	}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$user = new User;

        $user->name   = ucfirst(Input::get('username'));
        $user->email      = Input::get('email');
        $user->password   = Hash::make(Input::get('password'));
		$user->user_role  = Input::get('user_role');
 
        $user->save();
		$userid= $user->id;
		if(Input::get('user_role') ==3) // when doctor added.
		{	
				DB::table('doctor_details')->insert(
    			['doctor_id' => $userid, 'doctor_type' => Input::get('doctor_type')]
			);
		
		}
		elseif(Input::get('user_role') ==4) // when school added.
		{	$doctors = Input::get('doctors');
				if(isset($doctors) && count($doctors)>0)
				{
					foreach($doctors as $doctor)
					{
				DB::table('school_details')->insert(
    			['school_id' => $userid, 'doctor_id' => $doctor, 'nurse_id' => Input::get('school_nurse')]);
					}
				}
		
		}
		elseif(Input::get('user_role') ==5) // when student added.
		{	
				DB::table('student_details')->insert(
    			['student_id' => $userid, 'school_id' => Input::get('school'), 'birth_date' => Input::get('birth_date'),'class_id' => Input::get('class_id'),'section_id' => Input::get('section_id'),'gender' => Input::get('gender'),'roll_number' => Input::get('roll_number'),'father_name' => Input::get('father_name'),'mother_name' => Input::get('mother_name'),'phone_no' => Input::get('phone_no'),'address' => Input::get('address')]
			);
		
		}
			$file = Input::file('userpic');
			if($file!='')
			{
				$this->upload_userpic($file , $userid, Input::get('email'));
			}
    		Session::flash('message', 'Successfully created User!');
			
        return Redirect::to('admin/users');
	}

	function upload_userpic($file, $user_id)
	{
		
	    $imageTempName = $file->getPathname();
        $imageName = $file->getClientOriginalName();
		$imageName = $user_id.'_pic'.$imageName;
		$path = base_path() . '/storage/user_pics';
        $file->move($path , $imageName);
        DB::table('users')
            ->where('id', $user_id)
            ->update(['pic' => $imageName]);
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 $user = User::find($id);
		 return View::make('admin/users.edit', [ 'user' => $user ]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		 $user = User::find(Input::get('user_id'));

        $user->password   = Hash::make(Input::get('password'));
 
        $user->save();
        
       /* $user->makeEmployee('member'); */
        
    		Session::flash('message', 'Successfully update User!');
        return Redirect::to('admin/users');
	}

	public function show($id)
	{
		$user = User::find($id);
 		$user_detail = 	DB::table('users')->select('users.*','student_details.*','classes.class_name')->join('student_details','student_details.student_id','=','users.id')->join('classes','classes.id','=','student_details.class_id')->where('users.id','=',$id)->get();
		
         return View::make('admin/users.show', [ 'user_detail' => $user_detail]);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		 User::destroy($id);
		 Session::flash('message', 'Successfully deleted User!');	
 	    return Redirect::to('admin/users');
	}

	public function report($id)
	{
		 $user = User::find($id);
		 if($user->user_role == 2 || $user->user_role == 3)
		 {
			 if($user->user_role == 2){
				 $condition ='';
				 if(Input::get('start_date') !="" && Input::get('end_date') !="" ){ 
				 	$startdate = Input::get('start_date');
					$start_date = date("Y-m-d", strtotime($startdate));
					$enddate = Input::get('end_date');
					$end_date = date("Y-m-d", strtotime($enddate));
					$condition .=' AND (checkup_date BETWEEN "'.$start_date.'" AND "'.$end_date.'") ';
					}
				$stSql="SELECT sc.*,u.name, sd.father_name FROM student_checkup sc
						LEFT JOIN student_details sd ON sc.student_id = sd.student_id
						LEFT JOIN users u ON sc.student_id = u.id WHERE sc.nurse_id =".$id.$condition; 
				$user_report=DB::select(DB::raw($stSql));
			 }
			 else
			 {
				 	$user_report='';
			 }
		 }
		 else
		 {
			 $user_report = array();
		 }
		 return View::make('admin/users.report', [ 'user_report' => $user_report ]);
	}
	
	public function idcard()
	{
		$schools = DB::table('users')->select('id','name')->where('user_role','=',4)->get();
		$classes = DB::table('classes')->get();
		
		$pdf_path ='';
		$user_details = array();
		if(Input::get('user_search')!==null && Input::get('user_search') ==1){
	 $query = DB::table('users')->selectRaw('users.* ,student_details.*,classes.class_name,u1.name as school_name,school_details.address as school_address,principal_sign')->join('student_details','student_details.student_id','=','users.id')->join('classes','classes.id','=','student_details.class_id');
	 	if(Input::get('school_id') !=""){
			$query = $query->leftjoin(DB::raw('users u1'),DB::raw('u1.id'),'=','student_details.school_id')->leftjoin('school_details','school_details.school_id','=','student_details.school_id')->where('student_details.school_id', '=', Input::get('school_id'));
			
		}
		if(Input::get('class_id') !=""){
			$query = $query->where('student_details.class_id', '=', Input::get('class_id'));
			
		}
		
		$user_details = $query->get();
		$html ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">


@page {
    padding: 4px 10px 4px 50px;
	margin:10px 0 10px 30px;
  }
.whole-card{
	clear:both;
	padding: 1px 0;
	width:780px;
	float:left;
	margin:0;
	display:block;
}
.col-4
{
	height: 140px;
	float: left;
}
.col-8
{
}
.card{
height:210px;
width: 332px;
border: 1px solid #fff;
display:inline-block;
max-height: 260px;
padding: 0 0 0 0;
 margin: 0;
}

img{
  width: 70px;
  margin: 10px;
}

.header h1{
  	color: #fff;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
	padding:2px 0;
	margin:0px;
	 font-family: times-roman;
}
.header h3{
	 color: #fff;
    font-size: 12px;
    font-weight: 600;
    text-align: center;
	padding:2px 0;
	margin:0;
	 font-family: times-roman;
}

/*p{

  font-family: segoe ui;
  line-height: 1.4em;
  font-size: 1.2em;
}*/
.student_img {
	/*border: 3px solid #bf0000;*/
	border: 3px solid blue;
    height: 100px;
    margin:  0;
    width: 100px;
	}
	.staff_img {
	border: 3px solid #8a2be2;
    height: 100px;
    margin:  0;
    width: 100px;
	}
.row { }
.student .header{
	/*background-color: red;*/
	background-color: blue;
}
.staff .header
{
	background-color: #663399;
}
#mainbox{
  font-family: times-roman;
  display:block;
  float:left;
}
table {}
table tbody {}
table tr {} 
table td { font-size:12px; font-family: times-roman;}
.footer {width:325px; }
.foot_wraper{width:80px;}

#foot_bar {
    background-color: red;
    padding: 10px;
}
.foo_back p {font-size: 12px;
    margin: 6px;
    text-align: center;}
	.page-break{
		page-break-before: always;
	}
</style>
</head>

<body>

<div id="mainbox">';
$i=0;
		foreach($user_details as $user_detail)
		{  if($user_detail->class_id  ==14)
			{	$card_class="staff";
				 $img_class="staff_img";
			}
			else
			{
				$card_class ='student';
				 $img_class="student_img";
			}
			 if($i % 5 === 0 && $i!=0)
			 {
				 $page_break =' page-break';
				 echo'<br>';
			 }
			 else
			 {
				 $page_break ='';
			 }
			$html .='
			
<div class="whole-card '. $page_break.'">          
<div class="card '.$card_class. '">
	<div class="header">
	<table >
	<tr><td >
	<img src="'.Config::get('app.SITE_URL').'/storage/user_pics/nehru_convent-school_logo11.jpg" style="height:55px;  margin: 0; width: 66px; float:left;padding-left:10px;" alt="">
	</td>
	<td style="width:250px;">
		<h1 style="font-family:dejavu sans;">'.$user_detail->school_name.'</h1>
		<h3 style="font-family:dejavu sans;">'.$user_detail->school_address.'</h3>
		</td>
		</tr>
	</table>
	</div>
	<table style="width:325px; padding:0 0 0 9px;">
		<tr>
		<td style="width:110px;">
        <img class="'.$img_class.'" src="'.Config::get('app.SITE_URL').'/storage/user_pics/'.$user_detail->pic.'"  alt="">
		<div class="foot_wraper">
<img src="'.Config::get('app.SITE_URL').'/storage/user_pics/'.$user_detail->principal_sign.'" style="height:20px;  margin: 0; width: 80px; float: left;padding-left:10px;" alt="">
		<p style="font-size:7px;margin:0; padding: 0px 0px 0px 20px;">Principal sign</p>
	</div>
		</td>
        <td style="width:214px;">
		<table>
		<tr>
		<td>Name :</td>
        <td>'.$user_detail->name.'</td>
        </tr>
        <tr>
        <td>Class :</td>
        <td> '.$user_detail->class_name.'</td>
        </tr>
        <tr>
        <td>F. Name :</td>
        <td>'.$user_detail->father_name.'</td>
        </tr>
        <tr>
        <td>M. Name</td>
        <td>'.$user_detail->mother_name.'</td>
        </tr>
		<tr>
        <td>D.O.B. :</td>
        <td>'.$user_detail->birth_date.'</td>
        </tr>
        <tr>
        <td>Phone No:</td>
        <td>'.$user_detail->phone_no.'</td>
        </tr>
        <tr>
        <td>Address :</td>
        <td>'.$user_detail->address.'</td>
        </tr>
        </table>
		 </td>
	 </tr>
	 </table>
 
 	<!--<div style="" class="footer">
	
		 	 </div>-->
</div>
<div class="card" style="background:#fff !important;padding-left:30px; float:rigtht;">
<table>
<tr>
<td> 
<img src="'.Config::get('app.SITE_URL').'/assets/images/site_logo.png" style="height:70px; width: 175px; margin: 0;" alt="">
<h3 style="text-align:center; margin: 0; color:#ff6f21;">www.wellokid.com</h3>
<p style=" text-align:center; margin: 0;">Contact: 9780919325<p>
</td>
<td>
<img style="height:100px; width: 100px; margin-top: 20px;  border: 3px solid #ffe1be;"  src="data:image/png;base64, '.base64_encode(QrCode::format("png")->size(150)->
generate(url('/login?user_id='.MD5($user_detail->student_id)))).'">
</td>
</tr>
</table>
<div class="foo_back" style="margin: 0;">
<p>A Comprehensive School Health Program by We Care Solution.</p>
<p>Under technical guidance from We care Auckland New Zealand </p>
</div>
</div>
</div>
<div style="clear:both"></div>';
$i++;
		}
		$html .= '</div>


</body>
</html>';
//echo $html; die;
   
   $school_id = Input::get('school_id');
   $class_id = Input::get('class_id');
    $pdf_path = 'storage/idcards/'.$school_id.'_'.$class_id.'.pdf';
 $pdf = PDF::loadHTML($html)->setPaper('a4', 'portrait')->setWarnings(false)->save($pdf_path,true);

		}
	
		return View::make('admin/users.idcard', array('user_details' => $user_details,'schools'=>$schools,'classes'=>$classes,'pdf'=>$pdf_path));

		
	}
}
