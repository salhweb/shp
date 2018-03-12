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
use App\Message;

//db-name
use wellokid;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
	 
	  public function __construct()
    {
	
    }
	
  	public function index()
	{
		
	}
    /**

   
   	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	}
	
	public function message()
	{ 
		if(Auth::user()!=null)
		{ 
			$unread_messages = DB::select(DB::raw('SELECT count(*) as unread_messages FROM messages
			 WHERE to_user = '.Auth::user()->id.' AND message_read=0'));
			 
			$messages = DB::select(DB::raw('SELECT *, u.name as sender_name FROM messages m
			 INNER JOIN users u ON u.id= m.from_user WHERE to_user = '.Auth::user()->id.''));
			
			$schoolssql="SELECT u.id, u.name as school_name FROM school_details sd
						INNER JOIN users u ON sd.school_id = u.id ";
		$schools=DB::select(DB::raw($schoolssql));
		$classessql="SELECT * FROM classes";
		$classes=DB::select(DB::raw($classessql));
		$sectionssql="SELECT * FROM class_sections";
		$sections=DB::select(DB::raw($sectionssql));
		
			$stSql="SELECT * FROM user_roles";
	    	$user_types=DB::select(DB::raw($stSql));
			foreach($user_types as $user_type)
			{
				if($user_type->role=='administrator')
				{
					$view='admin';
				}
				else
				{
					$view=$user_type->role;
				}
				return View::make($view.'.contact_form',array('unread_messages'=>$unread_messages,'messages'=>$messages,'send_to_users'=>$user_types,'schools'=>$schools,'classes'=>$classes,'sections'=>$sections));
			}
		}
		
	}
	
	public function send_message()
	{ 
		$message = new Message;

        $message->from_user   = Auth::user()->id;
        $message->to_user      = Input::get('user_id');
        $message->message   = Input::get('your_message');
		$message->message_date_time  = date('Y-m-d h:i:s');
 
        $message->save();
		
    		Session::flash('message', 'Message Successfully Sent!');
			
        return Redirect::to('messages');
	}
	
	public function getUsers()
	{
		$term = Input::get('term');
		$user_type = Input::get('user_type');
		$class_id = Input::get('class_id');
		$school_id = Input::get('school_id');
		$section_id = Input::get('section_id');
//	return Response::json($class_id); 
		$results ='';
		$query = DB::table('users');
	//	1 = administrator ,2 = nurse,3 = doctor,4 = school,5 = student
		if(Auth::user()->hasRole('administrator'))
		{  
			if($user_type == 5)// student searched
			{ 
					  $query = DB::table('users')->join('student_details','users.id','=','student_details.student_id')->select('users.id','users.name');
					  if($class_id !='')
					  {

						  	$query = $query->where('student_details.class_id', '=', $class_id);
					  }
					  if($section_id!='')
					  {
						 $query = $query->where('student_details.section_id', '=', $section_id);
					  }
					  if($school_id!='')
					  {
						  $query = $query->where('student_details.school_id', '=', $school_id);
					  }
				
			}
			else
			{ 
				 $query = DB::table('users')->select('users.id','users.name');
			}
      
		}
		$users = $query->where('users.user_role','=',$user_type)->where('users.name', 'LIKE', $term.'%')->get();
	 foreach($users as $user)
	{
		$results[] =['label'=>$user->name,'value'=>$user->id];
	}
	        return Response::json($results);
    }
}


