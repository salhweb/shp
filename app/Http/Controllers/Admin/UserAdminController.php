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
//use PDF;
use Excel;
use File;
use Config;
use Zipper;


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
	public function preferences()
	{
		$preferences = DB::table('preferences')->select('*')->orderBy('parent_id', 'ASC')->orderBy('order_by', 'ASC')->get();
		$user_roles = DB::table('user_roles')->select('*')->where('id','!=','1')->get();
		return View::make('admin/preferences', [ 'preferences' => $preferences, 'user_roles' => $user_roles ]);
	}
	
	public function storepreferences()
	{
		$perfs = implode(',',Input::get('preference_selected'));
		$user_type = Input::get('user_type');
		DB::table('users')->where('user_role', Input::get('user_type'))->update(['preferences' => $perfs]);			
		Session::flash('message', 'Successfully updated preferences!');	
 	    return Redirect::to('admin/preferences');
		
	}
	
	public function idcard()
	{
		$schools = DB::table('users')->select('id','name')->where('user_role','=',4)->get();
		$classes = DB::table('classes')->get();
		
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

		if(count($user_details > 0))
		{
			$today_date = date('d-m-Y H:i:s');
			$school_name = $user_details[0]->school_name;
$i=0;
		$path = base_path() . '/storage/QR/'.$today_date.'_'.$school_name.'/';
		$path_exist = File::isDirectory($path);
		if($path_exist)
		{
		}else
		{
			File::makeDirectory( $path, 0775);
		}
		
		foreach($user_details as $user_detail)
		{	  
     
   		$qrCode_content = url('/login?user_id='.MD5($user_detail->student_id)); 
    	$qrfileName = $user_detail->name.'_'.$user_detail->student_id.'_qr.png'; 
     
    	$pngAbsoluteFilePath = $path.$qrfileName;      
		// generating 
		if (!file_exists($pngAbsoluteFilePath)) { 
			QRcode::format("png")->size(150)->generate($qrCode_content, $pngAbsoluteFilePath); 
			
		}
     		$user_details[$i]->qr_file_name = $qrfileName;
$i++;
		}
	
   $school_id = Input::get('school_id');
   $class_id = Input::get('class_id');
		//convert stdclass object array to array
 		$user_details = json_decode( json_encode($user_details), true);
		Excel::create($school_name, function($excel) use($user_details) {

    	$excel->sheet('Sheetname', function($sheet) use($user_details) {
		$sheet->fromArray($user_details);		
    });

	}) ->store('xls', $path);//->export('xls');
	 $download_files = glob($path);
	 Zipper::make($path.date('d-m-Y').'_'.$school_name.'.zip')->add($download_files)->close();
	return response()->download($path.date('d-m-Y').'_'.$school_name.'.zip');	

		} //
	} 
		return View::make('admin/users.idcard', array('user_details' => $user_details,'schools'=>$schools,'classes'=>$classes));

		
	}
}
