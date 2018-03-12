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
		$query = DB::table('users')->join('school_details','users.id','=','school_details.school_id');
		$schools =$query->select('*')->get();
		
		return View::make('school.schools_listing',array('schools'=>$schools));
	

	}
	public function schoolsinsert() {
		$user = new User;

        $user->name   = ucfirst(Input::get('school_name'));
        $user->email      = Input::get('email');
        $user->password   = Hash::make(Input::get('password'));
		$user->user_role  = 4; // 4= school
 
        $user->save();
		$userid= $user->id;
			
		DB::table('school_details')->insert(
    			['school_id' => $userid, 
				'phone' => Input::get('phone'),
				'state' => Input::get('state'),
				'city' => Input::get('city'),
				'address' => Input::get('address'),
				'doctor_id' => Input::get('doctor_id'),
				'nurse_id' => Input::get('nurse_id')]);
				
			
	

			$file = Input::file('userpic');
			if($file!='')
			{
				$this->upload_userpic($file , $userid, Input::get('email'));
			}
    		Session::flash('message', 'Successfully added school!');
		 
		return Redirect::to('schools');
		
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
	
	public function create(){
	 	$nurse_query = DB::table('users')->select('*')->where('users.user_role','=', '2');
	    $nurses=$nurse_query->get();
		$doc_query = DB::table('users')->select('*')->where('users.user_role','=', '3');
	    $doct=$doc_query->get();
		
		 return View::make('school.add_new_schools',array( 'doct'=>$doct ,'nurses'=>$nurses));
	 
	 }
	 public function edit($id)
	{
		 $school = DB::table('users as u')->join('school_details as dd','u.id','=','dd.school_id')->where('u.id','=',$id)->select('u.name','u.email','dd.*')->get();
		$nurse_query = DB::table('users')->select('*')->where('users.user_role','=', '2');
	    $nurses=$nurse_query->get();
		$doc_query = DB::table('users')->select('*')->where('users.user_role','=', '3');
	    $doct=$doc_query->get();
		 return View::make('school.edit_school', [ 'school'=>$school,'doct'=>$doct ,'nurses'=>$nurses ]);
	}
public function update()
	{
		$user = User::find(Input::get('school_id'));
        $user->name   = ucfirst(Input::get('school_name'));
        $user->email      = Input::get('email');
 
        $user->save();
			
		DB::table('school_details')->where('school_id',Input::get('school_id'))->update([
				'phone' => Input::get('phone'),
				'state' => Input::get('state'),
				'city' => Input::get('city'),
				'address' => Input::get('address'),
				'doctor_id' => Input::get('doctor_id'),
				'nurse_id' => Input::get('nurse_id')]);
        
    		Session::flash('message', 'Successfully updated School!');
        return Redirect::to('schools');
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


