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

class SchoolController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
	 
	  public function __construct()
    {
		if(Auth::user()!=null //&& (Auth::user()->hasRole('school'))
		)
			{
			}
			else
			{
				echo'Invalid Access'; exit;
			}
    }
	
  	public function schoolslist()
	{
//2 -nurse,3-doctor,4-school,5-student
		$students = User::where('user_role','=','5')->get();
		
		$query = DB::table('users')->join('student_details','users.id','=','student_details.school_id')->join('classes','classes.id','=','student_details.class_id');
		if(Input::get('class_id') !='')
		{
			$query= $query->where('student_details.class_id','=',Input::get('class_id'));
		}
		if(Input::get('section') !='')
		{
			$query->where('student_details.section_id','=',Input::get('section_id'));
		}
		if(Input::get('student_name') !='')
		{
			$query->where('users.name','LIKE', '%'.Input::get('student_name').'%');
		}
		$stu = $query->select('*')->get();
		$classes= DB::table('classes')->select('*')->get();

		return View::make('school.schools_listing',array('students'=>$students,'stu'=>$stu,'classes'=>$classes));
	

	}
	public function schoolsinsert() {
		
		return View::make('school.add_new_schools');
		}
	
	
		
  	public function index()
	{

		
	

	}
    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
    */

   
   	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}
	
	public function addDailyhomework()
   {	
	$query = DB::table('classes')->select('*');
	$classes=$query->get();
	$query = DB::table('class_sections')->select('*');
	$sections=$query->get();
	return View::make('school.daily_home_work', array('classes'=>$classes ,'sections'=>$sections ));
   }
   
   public function storeDailyhomework()
   {	
   		$file = Input::file('home_work_file');
   		$imageTempName = $file->getPathname();
        $imageName = $file->getClientOriginalName();
		$imageName = Input::get('home_work_date').'_'.Input::get('class_id').'_'.$imageName;
		$path = base_path() . '/storage/home_work/school_'.Auth::user()->id;
		$path_without_base = 'storage/home_work/school_'.Auth::user()->id;
        $file->move($path , $imageName);

			DB::table('school_daily_home_work')->insert(
			['school_id' => Input::get('school_id'),'class_id' =>Input::get('class_id'),'section_id' =>Input::get('section_id'),'home_work'=>Input::get('home_work'),'home_work_date'=>Input::get('home_work_date'),'file'=> $path_without_base.'/'.$imageName]);
		
		
    		Session::flash('message', 'Successfully added!');
			
        return Redirect::to('add-daily-home-work');
   }

  
}


