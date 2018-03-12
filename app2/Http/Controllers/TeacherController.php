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
use App\Classes;

//db-name
use wellokid;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
/**
     * Show a list of all of the application's users.
     *
     * @return Response
     */

  public function __construct()
    {
			if(Auth::user()!=null //&& (Auth::user()->hasRole('doctor'))
			)
			{
			}
			else
			{
				echo'Invalid Access'; exit;
			}
    }
 public function index(){
	$query = DB::table('users as u')->leftJoin('teacher_details as td','u.id','=','td.teacher_id')->where('u.user_role','=',6);
	if(Input::get('user_keyword') !=""){ 
		$query = $query->where('u.name', 'LIKE', '%'.Input::get('user_keyword').'%');
		}
	$teachers  = $query->select('u.name','td.*')->get();
	  return View::make('teacher.teachers',array('teachers'=>$teachers));
 }
 
	 public function create(){
	 	$class_query = DB::table('classes')->select('*');
	    $classes=$class_query->get();
	 return View::make('teacher.add_new_teacher',array('classes'=>$classes));
	 }
	 
	 public function store()
	{
		
		$user = new User;

        $user->name   = ucfirst(Input::get('teacher_name'));
        $user->email      = Input::get('email');
        $user->password   = Hash::make(Input::get('password'));
		$user->user_role  = 6; // 6= teacher
 
        $user->save();
		$userid= $user->id;
			
		DB::table('teacher_details')->insert(
    			['teacher_id' => $userid, 
				'school_id' => Auth::user()->id,
				'class_id' => Input::get('class_id'),
				'phone' => Input::get('phone'),
				'gender' => Input::get('gender'),
				'birth_date' => Input::get('birth_date'),
				'qualification' => Input::get('qualification'),
				'state' => Input::get('state'),
				'city' => Input::get('city'),
				'address' => Input::get('address')]);
			
	

			$file = Input::file('userpic');
			if($file!='')
			{
				$this->upload_userpic($file , $userid, Input::get('email'));
			}
    		Session::flash('message', 'Successfully added teacher!');
			
        return Redirect::to('teachers');
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
	
		public function edit($id)
	{
		 $teacher = DB::table('users as u')->join('teacher_details as td','u.id','=','td.teacher_id')->where('u.id','=',$id)->select('u.name','u.email','td.*')->get();
		 $class_query = DB::table('classes')->select('*');
	    $classes=$class_query->get();
		 return View::make('teacher.edit_teacher', [ 'teacher' => $teacher,'classes'=>$classes ]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$user = User::find(Input::get('teacher_id'));
        $user->name   = ucfirst(Input::get('teacher_name'));
        $user->email      = Input::get('email');
 
        $user->save();
			
		DB::table('teacher_details')->where('teacher_id',Input::get('teacher_id'))->update([
				'class_id' => Input::get('class_id'),
				'phone' => Input::get('phone'),
				'gender' => Input::get('gender'),
				'birth_date' => Input::get('birth_date'),
				'qualification' => Input::get('qualification'),
				'state' => Input::get('state'),
				'city' => Input::get('city'),
				'address' => Input::get('address')]);
        
    		Session::flash('message', 'Successfully updated teacher!');
        return Redirect::to('teachers');
	}
	
		public function addDailyhomework()
   {	

	$query = DB::table('class_sections')->select('*');
	$sections=$query->get();
	return View::make('teacher.daily_home_work', array('sections'=>$sections ));
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
		$teacher_detail = DB::table('teacher_details')->where('teacher_id','=', Auth::User()->id)->select('school_id','class_id')->get();

			DB::table('school_daily_home_work')->insert(
			['school_id' =>$teacher_detail[0]->school_id,'class_id' => $teacher_detail[0]->class_id,'section_id' =>Input::get('section_id'),'home_work'=>Input::get('home_work'),'home_work_date'=>Input::get('home_work_date'),'file'=> $path_without_base.'/'.$imageName]);
		
		
    		Session::flash('message', 'Successfully added!');
			
        return Redirect::to('add-daily-home-work');
   }

	 
}