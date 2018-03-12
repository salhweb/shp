<?php

namespace App\Http\Controllers;
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

//db-name
use wellokid;
use App\Http\Controllers\Controller;

class NurseController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
	 
	  public function __construct()
    {
		if(Auth::user()!=null) // && (Auth::user()->hasRole('nurse')))
			{ 
			}
			else
			{
				echo'Invalid Access'; exit;
			}
    }
	public function nurseslist() 
	{
		//2 -nurse,3-doctor,4-school,5-student
		$schools = User::where('user_role','=','4')->get();
		$query = DB::table('users')->join('nurse_details','users.id','=','nurse_details.nurse_id');
		if(Input::get('school') !='')
		{
			$query->where('nurse_details.school_id','=',Input::get('school'));
		}
		if(Input::get('nurse_name') !='')
		{
			$query->where('users.name','LIKE', '%'.Input::get('nurse_name').'%');
		}
		$nurses = $query->select('*')->get();
		return View::make('nurse.nurses_listing',array('schools'=>$schools,'nurses'=>$nurses));
		 
		
	}
	public function creat(){
	 	$school_query = DB::table('users')->select('*')->where('users.user_role','=', '4');
	    $schools=$school_query->get();
		$doc_query = DB::table('doctor_types')->select('*');
	    $doctype=$doc_query->get();
		
		 return View::make('nurse.add_new_nurse',array( 'doctype'=>$doctype ,'schools'=>$schools));
	 
	 }
	public function addnewnurse()
	{
	
	 $user = new User;

        $user->name   = ucfirst(Input::get('nurse_name'));
        $user->email      = Input::get('email');
        $user->password   = Hash::make(Input::get('password'));
		$user->user_role  = 2; // 2= nurse
 
        $user->save();
		$userid= $user->id;
			
		DB::table('nurse_details')->insert(
    			['nurse_id' => $userid, 
				'phone' => Input::get('phone'),
				'gender' => Input::get('gender'),
				'birth_date' => Input::get('birth_date'),
				'state' => Input::get('state'),
				'city' => Input::get('city'),
				'address' => Input::get('address'),
				'education' => Input::get('education'),
				'school_id' => Input::get('school_id')]);
			
	

			$file = Input::file('userpic');
			if($file!='')
			{
				$this->upload_userpic($file , $userid, Input::get('email'));
			}
    		Session::flash('message', 'Successfully added Nurse!');
		 
		return Redirect::to('nurses');
		
		}
		public function edit($id)
	{
		 $nurse = DB::table('users as u')->join('nurse_details as dd','u.id','=','dd.nurse_id')->where('u.id','=',$id)->select('u.name','u.email','dd.*')->get();
		$school_query = DB::table('users')->select('*')->where('users.user_role','=', '4');
	    $schools=$school_query->get();
		 return View::make('nurse.edit_nurse', [ 'nurse'=>$nurse,'schools'=>$schools ]);
	}
public function update()
	{
		$user = User::find(Input::get('nurse_id'));
        $user->name   = ucfirst(Input::get('nurse_name'));
        $user->email      = Input::get('email');
 
        $user->save();
			
		DB::table('nurse_details')->where('nurse_id',Input::get('nurse_id'))->update([
				'phone' => Input::get('phone'),
				'gender' => Input::get('gender'),
				'birth_date' => Input::get('birth_date'),
				'education' => Input::get('education'),
				'state' => Input::get('state'),
				'city' => Input::get('city'),
				'address' => Input::get('address'),
				'school_id' => Input::get('school_id')]);
        
    		Session::flash('message', 'Successfully updated Nurse!');
        return Redirect::to('nurses');
	}
	
	 	
  	public function index()
	{
		$class_query = DB::table('classes')->select('*');
	    $classes=$class_query->get();
	
		$query = DB::table('student_details')->select('student_details.*','users.name','classes.class_name', 'users.id as user_id')->join('school_details','school_details.school_id','=','student_details.school_id')->join('users','student_details.student_id','=','users.id')->join('classes','student_details.class_id','=','classes.id');
		if(Input::get('class') !=""){
			$query = $query->where('student_details.class_id', '=', Input::get('class'));
			
		}
		
		if(Input::get('user_keyword') !=""){ 
		$query = $query->where('users.name', 'LIKE', '%'.Input::get('user_keyword').'%');
		}
		$query = $query->where('users.user_role', '=', '5');
		$query = $query->where('school_details.nurse_id','=',Auth::user()->id)->distinct();
		$queryStr =''; // array_except( Input::query(), Paginator::getPageName() );
		$users = $query->paginate(50)->appends($queryStr);		 
		 
 	         return View::make('users.index', array('users' => $users,'classes'=>$classes));
	

	}
    /**
	 * Show the form for creating a new resource. */

   public function create()
   { 
	  
	
	$query = Db::table('school_details as sd');
	$query->join('users as u1', 'sd.school_id', '=', 'u1.id');
	$query->where('sd.nurse_id','=',Auth::user()->id);
	$query->select('u1.id','u1.name');
	$user_detail=$query->get();
	$query = DB::table('classes')->select('*');
	$classes=$query->get();
	return View::make('users.create', array('user_detail'=>$user_detail,'classes'=>$classes));
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
		$user->user_role = 5; //student
 
        $user->save();
		$userid= $user->id;
			DB::table('student_details')->insert(
    			['student_id' => $userid, 'father_name' =>  Input::get('father_name'),'address' => Input::get('address'),'gender'=> Input::get('gender'),'school_id' => Input::get('school_id'),'birth_date' =>Input::get('birth_date'),'class_id'=> Input::get('class_id'),'section_id'=> Input::get('section_id')]
			);
		
			
			$file = Input::file('userpic');
		
			$this->upload_userpic($file , $userid);
			
    		Session::flash('message', 'Successfully created Student!');
			
        return Redirect::to('users');
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
	
	public function checkup($id)
	{
		
		$query = DB::table('student_details')->select('student_details.*','users.name','classes.class_name', 'users.id as user_id')->join('users','student_details.student_id','=','users.id')->join('classes','student_details.class_id','=','classes.id')->where('users.id','=',$id)->distinct();
	$user_detail=	$query->get();
		$checkup_details =  DB::table('student_checkup')->select('*')->where('student_id','=',$id)->get();
	
		 return View::make('users.checkup', [ 'user_detail' => $user_detail ,'checkup_details' =>$checkup_details ]);
	}
	
		public function postCheckup($id)
	{
			DB::table('student_checkup')->insert(
    			['student_id' => $id, 'nurse_id' =>  Auth::user()->id,'time_in' => Input::get('time_in'),'time_out'=> date('H:i:s'),'checkup_date' => date('Y-m-d'),'student_problem' =>Input::get('student_problem'),'nurse_suggestion'=> Input::get('nurse_suggestion')]
			);
		
		
    		Session::flash('message', 'Checkup posted Succesfully!');
			
        return Redirect::to('users');
	}

        public function basicDetail($id)
	{
		
		$query = DB::table('student_details')->select('student_details.*','users.name','classes.class_name', 'users.id as user_id')->join('users','student_details.student_id','=','users.id')->join('classes','student_details.class_id','=','classes.id')->where('users.id','=',$id)->distinct();
	$user_detail=	$query->get();
		$checkup_details =  DB::table('student_checkup')->select('*')->where('student_id','=',$id)->get();
                   $student_basic_details = DB::table('student_basic_details')->select('*')->where('student_id','=',$id)->orderBy('id', 'DESC')->limit(1)->get();
	
		 return View::make('users.student_basic_details', [ 'user_detail' => $user_detail ,'checkup_details' =>$checkup_details,'student_basic_details'=>$student_basic_details ]);
	}

	public function postbasicDetail($id)
	{ 
			DB::table('student_basic_details')->insert(
    			['student_id' => $id, 'b_grp' => Input::get('b_grp'),'height' => Input::get('height'),'weight' => Input::get('weight'),'medical_snapshot_allergies' => Input::get('medical_snapshot_allergies'),'m_s_allergies_2' => Input::get('m_s_allergies_2'),'m_s_allergies_3' => Input::get('m_s_allergies_3'),'recent_symptoms' => Input::get('recent_symptoms'),'risk_factors_well_being' => Input::get('risk_factors_well_being'),'risk_factors_sleep' => Input::get('risk_factors_sleep'),'risk_factors_physical_fitness' => Input::get('risk_factors_physical_fitness'),'risk_factors_alcohol' => Input::get('risk_factors_alcohol'),'risk_factors_smoking' => Input::get('risk_factors_smoking'),'risk_factors_tobacco' => Input::get('risk_factors_tobacco'),'risk_factors_occupational_risk' => Input::get('risk_factors_occupational_risk'),'risk_factors_respiratory_health' => Input::get('risk_factors_respiratory_health'),'risk_factors_digestive_health' => Input::get('risk_factors_digestive_health'),'risk_factors_muscoskeletal' => Input::get('risk_factors_muscoskeletal'),'risk_factors_heart_health' => Input::get('risk_factors_heart_health'),'risk_factors_diabetes' => Input::get('risk_factors_diabetes'),'important_info_membership_type' => Input::get('important_info_membership_type'),'important_info_primary_clinic' => Input::get('important_info_primary_clinic'),'important_info_primary_doctor' => Input::get('important_info_primary_doctor'),
'checkup_date' => date('Y-m-d')]);
		
		
    		Session::flash('message', 'Checkup posted Succesfully!');
			
        return Redirect::to('users');
	}
	
}


