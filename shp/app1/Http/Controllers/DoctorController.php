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
use Response;

//db-name
use wellokid;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
	 
	  public function __construct()
    {
			if(Auth::user()!=null && (Auth::user()->hasRole('doctor')))
			{
			}
			else
			{
				echo'Invalid Access'; exit;
			}
    }
	
  	public function index()
	{
		$class_query = DB::table('classes')->select('*');
	    $classes=$class_query->get();
	
		$query = DB::table('student_details')->select('student_details.*','users.name','classes.class_name', 'users.id as user_id')->join('school_details','school_details.school_id','=','student_details.school_id')->join('users','student_details.student_id','=','users.id')->join('classes','student_details.standard','=','classes.id');
		if(Input::get('class') !=""){
			$query = $query->where('student_details.standard', '=', Input::get('class'));
			
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
	 * Show the form for creating a new resource.
----------
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
    			['student_id' => $userid, 'father_name' =>  Input::get('father_name'),'address' => Input::get('address'),'gender'=> Input::get('gender'),'school_id' => Input::get('school_id'),'birth_date' =>Input::get('birth_date'),'standard'=> Input::get('class_id')]
			);
		
		
    		Session::flash('message', 'Successfully created Student!');
			
        return Redirect::to('users');
	}
	

   
	public function viewdetail()
	{
		$stSql="SELECT sd.school_id, u.name as school_name FROM school_details sd
						INNER JOIN users u ON sd.school_id = u.id WHERE sd.doctor_id =".Auth::user()->id;										        $schools=DB::select(DB::raw($stSql));
		$classessql="SELECT * FROM classes";
		$classes=DB::select(DB::raw($classessql));
		$sectionssql="SELECT * FROM class_sections";
		$sections=DB::select(DB::raw($sectionssql));
		 return View::make('doctor.student_detail',array('schools'=>$schools,'classes'=>$classes,'sections'=>$sections));
	}
	
	public function gettreatment()
	{
		$stSql="SELECT sd.school_id, u.name as school_name FROM school_details sd
						INNER JOIN users u ON sd.school_id = u.id WHERE sd.doctor_id =".Auth::user()->id;										        $schools=DB::select(DB::raw($stSql));
		$classessql="SELECT * FROM classes";
		$classes=DB::select(DB::raw($classessql));
		$sectionssql="SELECT * FROM class_sections";
		$sections=DB::select(DB::raw($sectionssql));
		 return View::make('doctor.treatment',array('schools'=>$schools,'classes'=>$classes,'sections'=>$sections));
	}
	
	public function studenthealthmedicaldetail()
	{
		$student_id = Input::get('student_name');
		$feedback_type = Input::get('feedback_type');
		$student_details = DB::table('student_'.$feedback_type)->select('*')->where('student_id','=',$student_id)->get(); 
//echo $student_id.'=='.$feedback_type;		echo'<pre>';print_r($student_details);die;
		return View::make('doctor.'.$feedback_type,array('user_detail' => $student_details,'student_id'=>$student_id));
	}
	
	public function getstudent()
	{
		$term = Input::get('term');
		$class_id = Input::get('class_id');
		$school_id = Input::get('school_id');
		$section_id = Input::get('section_id');
		$results ='';
        $users = DB::table('student_details')->join('users','users.id','=','student_details.student_id')->select('users.id','users.name')->where('student_details.class_id', '=', $class_id)->where('student_details.section_id', '=', $section_id)->where('student_details.school_id', '=', $school_id)->where('users.name', 'LIKE', $term.'%')->get();
	 foreach($users as $user)
	{
		$results[] =['label'=>$user->name,'value'=>$user->id];
	}
        return Response::json($results);
    }
	
	public function general_assessment()
	{
		return View::make('doctor.general_assessment');
	}
	
	public function post_general_assessment() 
	{	
	DB::table('general_assessment')->insert([
	'student_id'  => Input::get('student_id') ,
	'student_growth'  => Input::get('student_growth'), 
	'tonsillitis'  => Input::get('tonsillitis'),
	 'hydrocele' => Input::get('hydrocele'),
	'consult_dietician' => Input::get('consult_dietician'), 
	'vision_problem' => Input::get('vision_problem'),
	 'consult_opthomologist' => Input::get('consult_opthomologist'),
	 'hearing_problem' => Input::get('hearing_problem'),
	 'need_ENT_doctor' => Input::get('need_ENT_doctor'), 
	 'unattended_dental_problems' => Input::get('unattended_dental_problems'),
	 'consult_dentist' => Input::get('consult_dentist'),
	 'learning_disability' => Input::get('learning_disability'), 
	 'speech_therapist' => Input::get('speech_therapist'), 
	 'skin_infection' => Input::get('skin_infection'), 
	 'consult_dermatologist' => Input::get('consult_dermatologist'),
	 'cardiac_condition' => Input::get('cardiac_condition'),
	 'consult_cardiologist' => Input::get('consult_cardiologist'), 
	 'physician_consultation' => Input::get('physician_consultation'), 
	 'clinical_psychologist_consultation' => Input::get('clinical_psychologist_consultation'),
	'overall_health_rank'=> Input::get('overall_health_rank'),
	 'updated_by' => Auth::user()->id, 
	 'updated_on' => date('Y-m-d')]);
 	 
	  Session::flash('message', 'Successfully submitted general assessment!');
		 return Redirect::to('student-checkup');
	}

	public function growth_development_assessment()
	{
		return View::make('doctor.growth_development_assessment');
	}
	
	public function post_growth_development_assessment() 
	{ 

	DB::table('growth_development_assessment')->insert([
	'student_id'  =>Input::get('student_id'),
	'height'  => Input::get('height'),
	'weight'  => Input::get('weight'),
	 'bp_sys' => Input::get('bp_sys'), 
	 'bp_dia' => Input::get('bp_dia'), 
	 'pulse' => Input::get('pulse'), 
	 'lung_capacity' => Input::get('lung_capacity'),
	 'oxygen_saturation' => Input::get('oxygen_saturation'),
	 'jumping_height' => Input::get('jumping_height'), 
	 'hopping_distance' => Input::get('hopping_distance'), 
	 'can_bend_back' => Input::get('can_bend_back'), 
	 'can_squat' => Input::get('can_squat'), 
	 'spine_shape' => Input::get('spine_shape'),
	 'gait' => Input::get('gait'), 
	 'left_hand_fingers_fold' => Input::get('left_hand_fingers_fold'), 
	 'right_hand_fingers_fold' => Input::get('right_hand_fingers_fold'), 
	 'left_hand_middle_finger_touch_the_shoulder' => Input::get('left_hand_middle_finger_touch_the_shoulder'), 
	 'right_hand_middle_finger_touch_the_shoulder' => Input::get('right_hand_middle_finger_touch_the_shoulder'),
	 'left_hand_middle_finger_touch_the_spine' => Input::get('left_hand_middle_finger_touch_the_spine'),
	 'right_hand_middle_finger_touch_the_spine' => Input::get('right_hand_middle_finger_touch_the_spine'),
	 'student_suffered_fracture' => Input::get('student_suffered_fracture'),
	 'post_fracture_stiffness' => Input::get('post_fracture_stiffness'), 
	 'suffer_from_knock_knees' => Input::get('suffer_from_knock_knees'),
	 'overall_health_rank'=> Input::get('overall_health_rank'),
	 'updated_by' =>  Auth::user()->id, 
	 'updated_on' => date('Y-m-d')]);
	 
	  Session::flash('message', 'Successfully submitted growth & development assessment!');

		 return Redirect::to('student-checkup');
	}

	public function learning_disability_assessment()
	{ 
		return View::make('doctor.learning_disability_assessment');
	}
	
	public function post_learning_disability_assessment() 
	{ 

	DB::table('learning_disability_assessment')->insert([
	'student_id' => Input::get('student_id'),
	'activity_status' => Input::get('activity_status'),
	 'student_stammer'=> Input::get('activity_status'),
	 'dyslexia'=> Input::get('activity_status'), 
	 'dyspraxia'=> Input::get('activity_status'), 
	 'dyscalculia'=> Input::get('activity_status'), 
	 'positive_for_ADD'=> Input::get('activity_status'),
	 'speech_therapist'=> Input::get('activity_status'),
	'overall_health_rank'=> Input::get('overall_health_rank'),	 
	 'updated_by' => Auth::user()->id ,
	 'updated_on'=> date('Y-m-d')]);
	 
	  Session::flash('message', 'Successfully submitted learning disability assessment!');

		 return Redirect::to('student-checkup');
}

	public function sports_fitness_assessment()
	{
		return View::make('doctor.sports_fitness_assessment');
	}
	
	public function post_sports_fitness_assessment() 
	{ 

	DB::table('sports_fitness_assessment')->insert([
	'student_id' => Input::get('student_id'),
	 'outcome_of_ecg' => Input::get('outcome_of_ecg'),
	 'general_assessment' => Input::get('general_assessment'),
	 'growth_assessment'=> Input::get('growth_assessment'),
	 'bp_status'=> Input::get('bp_status'), 
	 'oxygen_saturation_level'=> Input::get('oxygen_saturation_level'), 
	 'flat_foot'=> Input::get('flat_foot'), 
	 'left_foot'=> Input::get('left_foot'),
	 'right_foot'=> Input::get('right_foot'),
	 'haemoglobin_level'=> Input::get('haemoglobin_level'),
	 'doctor_opinion'=> Input::get('doctor_opinion'),
	 'overall_health_rank'=> Input::get('overall_health_rank'),
	 'updated_by' => Auth::user()->id ,
	 'updated_on'=> date('Y-m-d')]);
 	 
	  Session::flash('message', 'Successfully submitted sports fitness assessment!');

		 return Redirect::to('student-checkup');
	}

	public function vision_assessment()
	{
		return View::make('doctor.vision_assessment');
	}
	
	public function post_vision_assessment() 
	{ 

	DB::table('vision_assessment')->insert([
	'student_id' => Input::get('student_id'),
	 'ocular_alignment'=> Input::get('ocular_alignment'), 
	 'wearing_spectacles'=> Input::get('wearing_spectacles'), 
	 'crust_in_the_eye'=> Input::get('crust_in_the_eye'), 
	 'white_pupil'=> Input::get('white_pupil'),
	 'eye_wandering'=> Input::get('eye_wandering'),
	 'rubbing_eyes'=> Input::get('rubbing_eyes'), 
	 'bright_light'=> Input::get('bright_light'), 
	 'color_blind'=> Input::get('color_blind'), 
	 'night_blindness'=> Input::get('night_blindness'),
	 'nausea'=> Input::get('nausea'), 
	 'suffer_from_headache'=> Input::get('suffer_from_headache'),
	 'thrusting_head'=> Input::get('thrusting_head'),
	 'student_turning'=> Input::get('student_turning'),
	 'head_close_to_book'=> Input::get('head_close_to_book'), 
	 'blurred_vision'=> Input::get('blurred_vision'),
	 'left_eye_acuity'=> Input::get('right_eye_acuity'),
	 'right_eye_acuity'=> Input::get('right_eye_acuity'),
	 'right_spherical'=> Input::get('right_spherical'), 
	 'left_spherical'=> Input::get('left_spherical'), 
	 'right_cylindrical'=> Input::get('right_cylindrical'),
	 'left_cylindrical'=> Input::get('left_cylindrical'),
	 'right_axis'=> Input::get('right_axis'), 
	 'left_axis'=> Input::get('left_axis'), 
	 'opthomologist_consultation'=> Input::get('opthomologist_consultation'),
	 'overall_health_rank'=> Input::get('overall_health_rank'),
	 'updated_by'=> Auth::user()->id ,
	 'updated_on'=>  date('Y-m-d')]);
 	 
	  Session::flash('message', 'Successfully submitted vision assessment!');

		 return Redirect::to('student-checkup');
	}
	
	public function hearing_assessment()
	{
		return View::make('doctor.hearing_assessment');
	}
	
	public function post_hearing_assessment() 
	{ 

	DB::table('hearing_assessment')->insert([
	'student_id' => Input::get('student_id'),
	'right_ear_125' => Input::get('right_ear_125'),
	'right_ear_250' => Input::get('right_ear_250'),
	'right_ear_500' => Input::get('right_ear_500'),
	'right_ear_1000' => Input::get('right_ear_1000'),
	'right_ear_2000' => Input::get('right_ear_2000'),
	'right_ear_4000' => Input::get('right_ear_4000'),
	'right_ear_8000' => Input::get('right_ear_8000'),
	'right_ear_comments' => Input::get('right_ear_comments'),
	'left_ear_125' => Input::get('left_ear_125'),
	'left_ear_250' => Input::get('left_ear_250'),
	'left_ear_500' => Input::get('left_ear_500'),
	'left_ear_1000' => Input::get('left_ear_1000'),
	'left_ear_2000' => Input::get('left_ear_2000'),
	'left_ear_4000' => Input::get('left_ear_4000'),
	'left_ear_8000' => Input::get('left_ear_8000'),
	'left_ear_comments' => Input::get('left_ear_comments'),
	'giddiness' => Input::get('giddiness'),
	'ear_discharge' => Input::get('ear_discharge'),
	'ear_wax' => Input::get('ear_wax'),
	'humming_sound' => Input::get('humming_sound'),
	'overall_health_rank'=> Input::get('overall_health_rank'),
    'updated_by'=> Auth::user()->id ,
	'updated_on'=>  date('Y-m-d')]);
 	 
	  Session::flash('message', 'Successfully hearing assessment!');

		 return Redirect::to('student-checkup');

	}
	
	
	public function dental_assessment()
	{
		return View::make('doctor.dental_assessment');
	}
	
	public function post_dental_assessment() 
	{ 

	DB::table('dental_assessment')->insert([
	'student_id' => Input::get('student_id'),
	'cross_bite_is_correct'=> Input::get('cross_bite_is_correct'),
	'habit_of_thumb_sucking'=> Input::get('habit_of_thumb_sucking'),
	'dental_braises'=> Input::get('dental_braises'),
	'dental_alignment_corrections'=> Input::get('dental_alignment_corrections'),
	'checked_by_the_dentist'=> Input::get('checked_by_the_dentist'),
    'mouth_hygiene'=> Input::get('mouth_hygiene'),
	'condition_of_gum'=> Input::get('condition_of_gum'),
	'overall_health_rank'=> Input::get('overall_health_rank'),
	 'updated_by'=> Auth::user()->id ,
	 'updated_on'=>  date('Y-m-d')]);
 	 
	  Session::flash('message', 'Successfully dental assessment!');

		 return Redirect::to('student-checkup');

	}

        public function doctor_recommendation()
	{
		 return View::make('doctor.doctor_recommendation');
	}

        public function post_doctor_recommendation()
	{
		 DB::table('doctor_recommendation')->insert([
	'student_id' => Input::get('student_id'),
	'diet_subject'=> Input::get('diet_subject'),
	'diet_recommendation'=> Input::get('diet_recommendation'),
	'mental_subject'=> Input::get('mental_subject'),
	'mental_recommendation'=> Input::get('mental_recommendation'),
	 'doctor_id'=> Auth::user()->id ,
	 'updated_on'=>  date('Y-m-d')]);
 	 
	  Session::flash('message', 'Successfully added recommendations!');

		 return Redirect::to('student-checkup');
	}
}


