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

class StudentController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
	 
	  public function __construct()
    {
		if(Auth::user()!=null ) //&& (Auth::user()->hasRole('student'))
			{
			}
			else
			{
				echo 'Invalid Access'; exit;
				return redirect('/');
				 
			}
   }
	
  	public function index()
	{

		if(Auth::user()!=null && (Auth::user()->hasRole('student')))
		{
		}
		else
		{
			echo'Invalid Access'; exit;
		}
	

	}
    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
    */
	public function create()
	{

	$schools = User::where('user_role','=','4')->get();
	$class_query = DB::table('classes')->select('*');
	    $classes=$class_query->get();
	$section_query = DB::table('class_sections')->select('*');
	$sections=$section_query->get();
	
        return View::make('student.add-student', array('classes' => $classes,'sections'=>$sections,'schools'=>$schools));	
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
		$user->user_role  = 5; //student
 
        $user->save();
		$userid= $user->id;
		DB::table('student_details')->insert(
    			['student_id' => $userid, 'school_id' => Auth::User()->id, 'birth_date' => Input::get('birth_date'),'class_id' => Input::get('class_id'),'section_id' => Input::get('section_id'),'gender' => Input::get('gender'),'roll_number' => Input::get('roll_number'),'father_name' => Input::get('father_name'),'mother_name' => Input::get('mother_name'),'phone_no' => Input::get('phone_no'),'address' => Input::get('address')]
			);
	
			$file = Input::file('userpic');
			if($file!='')
			{
				$this->upload_userpic($file , $userid, Input::get('email'));
			}
    		Session::flash('message', 'Successfully created student!');
			
        return Redirect::to('/students');
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
	
 	public function students()
   {	//2 -nurse,3-doctor,4-school,5-student		
			
		$query1 = DB::table('users')->select('users.name','student_details.*','classes.class_name');
		$query= $query1->join('student_details','student_details.student_id','=','users.id')->join('classes','classes.id','=','student_details.class_id');
		$query = $query->where('users.user_role', '=', 5);
		if(Input::get('class_id') !=""){
			$query= $query->where('student_details.class_id','=',Input::get('class_id'));
		}
		if(Input::get('user_keyword') !="")
		{
			$query = $query->where('users.name', 'LIKE', '%'.Input::get('user_keyword').'%');
		}	   
	   if(Auth::user()->hasrole('school'))
	   {
			$query= $query->where('student_details.school_id','=',Auth::user()->id);
	   }

		
	//	$queryStr = array_except( Input::query(), Paginator::getPageName() );
	//	$users = $query->paginate(50)->appends($queryStr);		 simplePaginate
		$users = $query->simplePaginate(50);
		$classes = DB::table('classes')->select('*')->get();

 	         return View::make('student.students',array('users'=>$users,'classes'=>$classes));
   }

       public function viewStudent($id)
   {	
   		
 		$user_detail = 	DB::table('users')->select('users.name','student_details.*','classes.class_name')->join('student_details','student_details.student_id','=','users.id')->join('classes','classes.id','=','student_details.class_id')->where('student_details.school_id','=',Auth::user()->id)->where('users.id','=',$id)->get();	
	
 	         return View::make('school.show', array('user_detail' => $user_detail));
   }
   
	public function gethomework()
   {	
	$query = DB::table('school_daily_home_work as hm')->select('hm.*')->join('student_details as sd','sd.school_id','=','hm.school_id')->where('hm.home_work_date','=',date('Y-m-d'))->where('sd.student_id','=',Auth::user()->id);
	$hm=$query->get();
	return View::make('student.home_work', array('hm'=>$hm));
   }
   
   public function postDailyhomework()
   {	

			DB::table('school_daily_home_work')->insert(
			['school_id' => Input::get('school_id'),'class_id' =>Input::get('class_id'),'home_work'=>Input::get('home_work'),'home_work_date'=>Input::get('home_work_date')]);
		
		
    		Session::flash('message', 'Successfully added!');
			
        return Redirect::to('daily_home_work');
   }
   	public function healthmedicaldetail(Request $request)
   {
	$query = Db::table('student_details');
	$query->where('student_id','=',Auth::user()->id);
	$query->select('*');
	$user_detail=$query->get();
	$query1 = Db::table('student_medical_detail');
	$query1->where('student_id','=',Auth::user()->id);
	$query1->select('*');
	$med_det=$query1->get();
	
	$feedback_type =$request->feedback_type;
	if(isset($feedback_type))
	{   if($feedback_type =='physical_fitness')
		{
			$feedback ='physical_fitness';
		}
		elseif($feedback_type =='mental_health')
		{
			$feedback ='mental_health';
		}
		elseif($feedback_type =='diet_nutrition')
		{
			$feedback ='diet_nutrition';
		}
		else
		{$feedback ='medical_detail';
		}
	}
	else
	{
		$feedback ='medical_detail';
	}
	
	return View::make('student.'.$feedback, array('user_detail'=>$user_detail,'med_det'=>$med_det));
   }
   
   
   public function posthealthmedicaldetail()
   {
	  
	$query = Db::table('student_details');
	$query->where('student_id','=',Auth::user()->id);
	$query->select('*');
	$user_detail=$query->get();
	$date = date("Y-m-d");
	$feedback_type = Input::get('feedback_type');
	if(isset($feedback_type))
	{
		if($feedback_type =='medical_detail')
		{
	DB::table('student_medical_detail')->insert([
	'student_id'  => Auth::user()->id ,
	'family_heart_attack' => Input::get('family_heart_attack'), 
	'family_high_blood_pressure' => Input::get('family_high_blood_pressure'), 
	'family_diabetes' => Input::get('family_diabetes') , 
	'family_hyper_cholesterol' => Input::get('family_hyper_cholesterol') , 
	'family_cancer' => Input::get('family_cancer') , 
	'family_obesity_overweight' => Input::get('family_obesity_overweight') , 
	'family_asthma' => Input::get('family_asthma') ,
'ward_high_blood_pressure' => Input::get('ward_high_blood_pressure') ,
'ward_high_blood_sugar_random' => Input::get('ward_high_blood_sugar_random') ,
'ward_low_hemoglobin' => Input::get('ward_low_hemoglobin') ,
'ward_asthma' => Input::get('ward_asthma') ,
'medical_check_up' => Input::get('medical_check_up') ,
'bcg_gainst_tb' => Input::get('bcg_gainst_tb') ,
'hepatitis_b_vaccine_against_jaundice' => Input::get('hepatitis_b_vaccine_against_jaundice') ,
'diphlheria_whooping_cough_tetanus' => Input::get('diphlheria_whooping_cough_tetanus') ,
'hepatitis_a_vaccine' => Input::get('hepatitis_a_vaccine') ,
'tetanus_dp' => Input::get('tetanus_dp') ,
'oral_polio_vaccine' => Input::get('oral_polio_vaccine') ,
'measles_mumps_ruebella' => Input::get('measles_mumps_ruebella') ,
'chicken_pox' => Input::get('chicken_pox') ,
'typhoid' => Input::get('typhoid') ,
'chronic_illness' => Input::get('chronic_illness') ,
'cough_and_cold' => Input::get('cough_and_cold') ,
'fever' => Input::get('fever') ,
'bronchitis' => Input::get('bronchitis') ,
'urinary_track_infection' => Input::get('urinary_track_infection') ,
'other_treatment' => Input::get('other_treatment') ,
'ward_allergic' => Input::get('ward_allergic') ,
'submitted_on' => $date]);
		$update_field = array('medical_detail_filled' => 1);
		}
		elseif($feedback_type =='physical_fitness')
		{
				DB::table('student_physical_fitness')->insert([
	'student_id'  => Auth::user()->id ,
	 'how_active' => Input::get('how_active'),
 'do_excercise' => Input::get('do_excercise'),
 'excercise_type' => Input::get('excercise_type'),
 'time_of_exercise' => Input::get('time_of_exercise'),
 'play_game_in_school' => Input::get('play_game_in_school'),
 'which_game_play_in_school' => Input::get('which_game_play_in_school'),
 'time_of_game_in_school' => Input::get('time_of_game_in_school'),  
 'activity_in_evening' => Input::get('activity_in_evening'), 
 'which_activity_in_evening' => Input::get('which_activity_in_evening'), 
 'activity_after_dinner' => Input::get('activity_after_dinner'),
 'hold_breathe' => Input::get('hold_breathe'), 
 'can_touch_palms' => Input::get('can_touch_palms'), 
 'sit_ups' => Input::get('sit_ups'), 
 'abdomen_fat' => Input::get('abdomen_fat'), 
 'submitted_on'=> $date]);
			
			$update_field = array('physical_fitness_filled' => 1);
		}
		elseif($feedback_type =='mental_health')
		{
			DB::table('student_mental_health')->insert([
	'student_id'  => Auth::user()->id ,
	'family_size' => Input::get('family_size'), 
'family_position' => Input::get('family_position'), 
'accommodation' => Input::get('accommodation') , 
'rooms'=> Input::get('rooms') , 
'study_facility' => Input::get('study_facility') ,
 'lives_with' => Input::get('lives_with'),
 'family_type' => Input::get('family_type'),
 'behavior_with_peer_group' => Input::get('behavior_with_peer_group'), 
 'leadership' => Input::get('leadership'), 
 'sociability' => Input::get('sociability'),
 'initiative'  => Input::get('initiative'), 
 'behavior_with_teacher'  => Input::get('behavior_with_teacher'),
 'personality' => Input::get('personality'), 
 'attendance' => Input::get('attendance'), 
 'obedience' => Input::get('obedience'), 
 'responsibility' => Input::get('responsibility'),
 'industry'=> Input::get('industry'), 
 'home_work' => Input::get('home_work'), 
 'self_confidence' => Input::get('self_confidence'), 
 'personal_appearance' => Input::get('personal_appearance'),
 'behavior_with_parents' => Input::get('behavior_with_parents'), 
 'submitted_on'=> $date]);
 
			$update_field = array('mental_health_filled' => 1);
		}
		elseif($feedback_type =='diet_nutrition')
		{
			DB::table('student_diet_nutrition')->insert([
	'student_id'  => Auth::user()->id ,
	'dietary_habits'=> Input::get('dietary_habits'),
 'breakfast_menu' => Input::get('breakfast_menu'), 
 'drink_milk_times' => Input::get('drink_milk_times'), 
 'what_add_to_milk' => Input::get('what_add_to_milk'), 
 'take_packed_snack' => Input::get('take_packed_snack'),  
 'how_often_take_packed_snack' => Input::get('how_often_take_packed_snack'), 
 'usually_packed_snack' => Input::get('usually_packed_snack'), 
 'eat_from_cantten' => Input::get('eat_from_cantten'), 
 'time_of_lunch' => Input::get('time_of_lunch'), 
 'lunch_menu' => Input::get('lunch_menu'), 
 'after_lunch' => Input::get('after_lunch'),
 'after_lunch_other' => Input::get('after_lunch_other'), 
 'dinner_time' => Input::get('dinner_time'),  
 'dinner_menu' => Input::get('dinner_menu'), 
 'sleep_time' => Input::get('sleep_time'),
 'frequency_of_eating' => Input::get('frequency_of_eating'), 
 'drink_water_daily' => Input::get('drink_water_daily'), 
 'consume_commerciall_food' => Input::get('consume_commerciall_food'),
 'eat_sweet_food' => Input::get('eat_sweet_food'),
 'submitted_on'=> $date]);
			$update_field = array('diet_nutrition_filled' => 1);
		}
		DB::table('student_details')
        ->where('student_id', Auth::user()->id)  
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update($update_field);
	}
	Session::flash('message', 'Details successfully submitted!');
	return View::make('student.'.$feedback_type, array('user_detail'=>$user_detail));
   }
   
   	public function myhealthreport()
	{
		$student_id = Auth::user()->id;
		$assessment_type = Input::get('assessment_type');
		if($assessment_type=='')
		{
			$assessment_type='general_assessment';
		}
		
		$student_details = DB::table($assessment_type)->select('*')->where('student_id','=',$student_id)->orderBy('id', 'DESC')->get(); 
		$assessment_tables =array('general_assessment', 'vision_assessment', 'sports_fitness_assessment', 'growth_development_assessment', 'learning_disability_assessment', 'dental_assessment','hearing_assessment');
		$overall_health_rank =0;
		foreach($assessment_tables as $assessment_table)
		{
					$overall_rank ='';
					
					$overall_rank = DB::table($assessment_table)->select('overall_health_rank')->where('student_id','=',$student_id)->orderBy('id', 'DESC')->limit(1)->get(); 
					if(isset($overall_rank) && count($overall_rank)>0)
					{
						$overall_health_rank = $overall_health_rank + $overall_rank[0]->overall_health_rank;
						
					}
		}
		$overall_health_percentage = round(($overall_health_rank/35)*100,2);
//echo		$overall_health_percentage; die;
//echo		$overall_health_rank; die;
//echo $student_id.'=='.$feedback_type;		echo'<pre>';print_r($student_details);die;
		return View::make('student.'.$assessment_type,array('user_detail' => $student_details,'student_id'=>$student_id,'overall_health_percentage'=>$overall_health_percentage));
	}


       public function doctor_recommendations()
       {
          $student_id = Auth::user()->id;
          $student_details = DB::table('doctor_recommendation')->select('*')->where('student_id','=',$student_id)->orderBy('id', 'DESC')->get(); 
          return View::make('student.doctor_recommendations',array('user_details' => $student_details));
       }

        public function additionalreports()
        {
             $student_id = Auth::user()->id;
          $student_details = DB::table('additional_reports')->select('*')->where('student_id','=',$student_id)->orderBy('id', 'DESC')->get();   
           return View::make('student.additional_reports',array('student_details'=>$student_details));
        }
        
        public function postadditionalreports()
        {
             $files = Input::file('attached_reports');
             $file_name="";
                if(count($files)>0)
                {
                    foreach($files as $file)
                    {
                      	$imageTempName = $file->getPathname();
                 $imageName = $file->getClientOriginalName();
		
		$path = base_path() . '/storage/additional_reports/school_'.Auth::user()->id;
		$path_without_base = 'storage/additional_reports/school_'.Auth::user()->id;
               $file->move($path , $imageName);
               $file_name .=$path_without_base.'/'.$imageName.',';
                  }
                }
   	
             DB::table('additional_reports')->insert([
	'student_id'  => Auth::user()->id ,
	'report_subject'=> Input::get('report_heading'),
 'report_details' => Input::get('report_details'), 
 'report_attachment' => rtrim($file_name,',')]);

      Session::flash('message', 'Report successfully added!');
			
        return Redirect::to('additional-reports');

        }
}


