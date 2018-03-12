<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Auth;
use Image;
use Hash;
use DB;
use Session;
class HomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        $user_detail ='';
        $overall_health_percentage ='';
         $user_basic_detail='';
        if(Auth::user()!=null && (Auth::user()->hasRole('student')))
	{
          $user_detail = 	DB::table('users')->select('users.name','student_details.*','classes.class_name')->join('student_details','student_details.student_id','=','users.id')->join('classes','classes.id','=','student_details.class_id')->where('users.id','=',Auth::user()->id)->get();


        $assessment_tables =array('general_assessment', 'vision_assessment', 'sports_fitness_assessment', 'growth_development_assessment', 'learning_disability_assessment', 'dental_assessment','hearing_assessment');
		$overall_health_rank =0;
               
		foreach($assessment_tables as $assessment_table)
		{
					$overall_rank ='';
					
					$overall_rank = DB::table($assessment_table)->select('overall_health_rank')->where('student_id','=',Auth::user()->id)->orderBy('id', 'DESC')->limit(1)->get(); 
					if(isset($overall_rank) && count($overall_rank)>0)
					{
						$overall_health_rank = $overall_health_rank + $overall_rank[0]->overall_health_rank;
						
					}
		}
		$overall_health_percentage = round(($overall_health_rank/35)*100,2);
          $user_basic_detail = DB::table('student_basic_details')->select('*')->where('student_id','=',Auth::user()->id)->orderBy('id', 'DESC')->limit(1)->get();
	}

        return view('home.welcome' , ['user_detail' => $user_detail , 'overall_health_percentage' => $overall_health_percentage, 'user_basic_detail' => $user_basic_detail]);
    }



    public function login()
    { 
		if(isset($_GET['user_id']))
		{
			$stSql="SELECT email FROM users WHERE MD5(id) =  '".$_GET["user_id"]."'";
	    	$user_email=DB::select(DB::raw($stSql));
		//	$user_email= users::where(DB::raw('md5("id")') ,$_GET["user_id"])->get();
		//	print_r($user_email); die;
	
			if(isset($user_email) && !empty($user_email))
			{
				return view('home.login', ['user_email' => $user_email]);
			}
			else
			{	
				Session::flash('message', 'User not found!');
				return view('home.login');
			}
		}
		else{
        	return view('home.login');
		}
    }




    public function doLogin()
    {
		
	
	$rules = array('email'=>'required|email','password' => 'required|min:3');

	$validator = Validator::make(Input::all(), $rules);


	if ($validator->fails()) 
	{
	  return redirect('login')->withErrors($validator)->withInput(Input::except('password'));
	} 
	else 
	{
	    $userdata = array('email'=>Input::get('email'),'password'  => Input::get('password'));
	    if (Auth::attempt($userdata)) 
	    {
			 return redirect('/');	     
	    } 
	    else 
	    {        
	      return redirect('login')->withErrors(array('Please enter a valid Email/password combination.'))->withInput(Input::except('password'));
	    }

	}
  }
	



    public function register()
    {
        return view('home.register');
    }		



    public function doRegister()
    {
	$filename='';
        $rules = array('name'=>'required','email'=>'required|email|unique:users','password' => 'required|min:3|confirmed','password_confirmation' => 'required|min:3','user_pic'=>'mimes:jpeg,jpg,png,gif');
        $validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) 
	{
	  return redirect('register')->withErrors($validator)->withInput(Input::except('password'));
	} 
	else 
	{

	if(Input::file())
        {
	  	$user_pic = Input::file('user_pic');
		$filename  = time() . '.' . $user_pic->getClientOriginalExtension();
                $path = storage_path('user_pics/' . $filename);
         	$img=Image::make($user_pic->getRealPath());
		
		$img->resize(200, 60, function ($constraint) {   $constraint->aspectRatio();});

		if(!$img->save($path))
		{
			return redirect('register')->withErrors($validator)->withInput(Input::except('password'));
		}
	
	}


				
		$user=new User;
                $user->pic = $filename;
		$user->name=Input::get('name');
		$user->email=Input::get('email');
		$user->password=Hash::make(Input::get('password'));
		if($user->save())
		{
			$credentials = array('email' => Input::get('email'),'password' => Input::get('password'));
			if (Auth::attempt($credentials)) 
			{
    				return redirect('/');
			}
		}
		else
		{
			$messages = ['user_save_status_field.required' => 'Oops !!! Signup process failed. Please check the values entered.'];
			$rules['user_save_status_field'] = 'required';
			$validator = $this->validate($request, $rules,$messages);
		}
	}
    }

	

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
	return redirect('login'); // redirect the user to the login screen
    }

	public function changePassword()
	{
		return view('home.changepassword');
	}
	
	public function dochangePassword()
	{
		$rules = array('old_password' => 'required', 'password' => 'required|min:3|confirmed', 'password_confirmation'=>'required|min:3');
		$validator = Validator::make(Input::all(), $rules);


	if ($validator->fails()) 
	{
	  return redirect('change-password')->withErrors($validator);
	} 
	else 
	{
		$current_password = DB::select(DB::raw("SELECT email, password FROM users WHERE id = ".Auth::user()->id));
		if (Hash::check(Input::get('old_password'), $current_password[0]->password)) 
		{
			$user = User::findorfail(Auth::user()->id);
			$user->password = Hash::make(Input::get('password'));
			if($user->save())
			{
				$credentials = array('email' => $current_password[0]->email,'password' => Input::get('password'));
				if (Auth::attempt($credentials)) 
				{
						return redirect('/');
				}
			}
		}
		else
		{
			  return view('home.changepassword')->withErrors(array("Old password doesn't match."));
		}
	}
	}
}
