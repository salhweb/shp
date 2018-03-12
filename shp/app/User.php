<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
//use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
//use Zizaco\Entrust\Traits\EntrustUserTrait;

use Auth;
use DB;

class User extends Model implements AuthenticatableContract,
                        
                                    CanResetPasswordContract
{
   use Authenticatable,  CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function hasRole($role)
    {
	$query = Db::table('users');
	$query->join('user_roles', 'users.user_role', '=', 'user_roles.id'); 	
	$query->where('user_roles.role', '=',$role);
	$query->where('users.id', '=',Auth::user()->id);
	$user=$query->take(1)->get();
	return count($user);
   }

    public function getRole()
    {
	$query = Db::table('users');
	$query->join('user_roles', 'users.user_role', '=', 'user_roles.id'); 
	$query->where('users.id', '=',Auth::user()->id);
	$user=$query->select('user_roles.role')->take(1)->get();
	return $user[0]->role;
   }
   
   public function getPreferences()
   {
		$userprefs = Db::table('users')->where('id', '=', Auth::user()->id)->select('preferences')->get();
		$userprefs = (array)$userprefs[0];
		return $userprefs;
   }
   public function allPreferences()
   {
	   $allprefs = Db::table('preferences')->select('*')->get();
	   return $allprefs;
   }
   
    public function getUnreadMessagesCount()
    {
	$query = Db::table('messages');
	$query->where('to_user', '=',Auth::user()->id)->where('message_read','=',0);
	$messages=$query->select('*')->get();
	return count($messages);
   }
   

}
