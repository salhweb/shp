<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Home or index
get('/', 'HomeController@index');
get('/login', 'HomeController@login');
post('/login', 'HomeController@doLogin');
//get('/register', 'HomeController@register');
//post('/register', 'HomeController@doRegister');
get('/logout', 'HomeController@doLogout');
get('/change-password', 'HomeController@changePassword');
post('/change-password', 'HomeController@dochangePassword');


/* ADMIN SECTION */
$router->group([
  'namespace' => 'Admin',
  'middleware' => 'auth',
], function () {
Route::resource('admin/users', 'UserAdminController');
Route::get('admin/users/{id}/edit', 'UserAdminController@edit');	
Route::post('/admin/users/update', 'UserAdminController@update');
Route::get('admin/users/{id}/report', 'UserAdminController@report');	
Route::get('admin/doctor_types/create', array('before' => 'old', 'uses' => 'DoctorTypesController@create'));
Route::post('admin/doctor_types/create', array('before' => 'old', 'uses' => 'DoctorTypesController@store'));
Route::get('admin/schools/create', array('before' => 'old', 'uses' => 'UserAdminController@schoolcreate'));
Route::post('admin/schools/create', array('before' => 'old', 'uses' => 'UserAdminController@schoolstore'));
Route::get('admin/preferences', array('before' => 'old', 'uses' => 'UserAdminController@preferences'));
Route::post('admin/preferences', array('before' => 'old', 'uses' => 'UserAdminController@storepreferences'));
Route::get('admin/idcard', array('before' =>'old', 'uses' => 'UserAdminController@idcard'));
});


/*******************************************NURSE SECTION*********************************************************/

Route::get('/nurses', array('before' => 'old', 'uses' => 'NurseController@nurseslist'));
Route::resource('users', 'NurseController');
Route::post('/nurse/update', 'NurseController@update');
Route::get('nurse/{id}/edit', 'NurseController@edit');
Route::get('users/{id}/edit', 'NurseController@edit');
Route::get('users/{id}/checkup', 'NurseController@checkup');	
Route::post('users/{id}/checkup', 'NurseController@postCheckup');
Route::get('users/{id}/basic-health-detail', 'NurseController@basicDetail');	
Route::post('users/{id}/basic-health-detail', 'NurseController@postbasicDetail');
Route::post('/add-nurse', array('before' => 'old', 'uses' => 'NurseController@addnewnurse'));
Route::get('/add-nurse', array('before' => 'old', 'uses' => 'NurseController@creat'));


/**************************************************STUDENT SECTION **********************************************/
Route::get('/add-student', array('before' => 'old', 'uses' => 'StudentController@create'));
Route::post('/add-student', array('before' => 'old', 'uses' => 'StudentController@store'));
Route::get('/students', array('before' => 'old', 'uses' => 'StudentController@students'));
Route::get('/student/{id}', array('before' => 'old', 'uses' => 'StudentController@viewStudent'));
Route::get('homework', 'StudentController@gethomework');

Route::get('health-medical-detail', 'StudentController@healthmedicaldetail');
Route::post('health-medical-detail', 'StudentController@posthealthmedicaldetail');
Route::get('/getfeedbackform', array('before' => 'old', 'uses' => 'StudentController@getfeedbackform'));
Route::get('/my-health-report', array('before' => 'old', 'uses' => 'StudentController@myhealthreport'));
Route::get('/additional-reports', array('before' => 'old', 'uses' => 'StudentController@additionalreports'));
Route::post('additional-reports', array('before' => 'old', 'uses' => 'StudentController@postadditionalreports'));
Route::get('/doctor-recommendations', array('before' => 'old', 'uses' => 'StudentController@doctor_recommendations'));



/**********************************************SCHOOL SECTION *****************************************************/
Route::post('/schools/update', 'SchoolController@update');
Route::get('schools/{id}/edit', 'SchoolController@edit');
Route::post('/add-school', array('before' => 'old', 'uses' => 'SchoolController@schoolsinsert'));
Route::get('/add-school', array('before' => 'old', 'uses' => 'SchoolController@create'));
Route::get('/schools', array('before' => 'old', 'uses' => 'SchoolController@schoolslist'));


/********************************** ***************DOCTOR SECTION*************************************************/
Route::post('/doctor/update', 'DoctorController@update');
Route::get('doctor/{id}/edit', 'DoctorController@edit');
Route::get('/add-doctor', array('before' => 'old', 'uses' => 'DoctorController@create'));
Route::post('/add-doctor', array('before' => 'old', 'uses' => 'DoctorController@doctorsinsert'));
Route::get('/doctors', array('before' => 'old', 'uses' => 'DoctorController@doctorslist'));
Route::get('/student-checkup', array('before' => 'old', 'uses' => 'DoctorController@gettreatment'));
Route::post('/student-assessment', array('before' => 'old', 'uses' => 'DoctorController@studentassessment'));
Route::get('/view-student-detail', array('before' => 'old', 'uses' => 'DoctorController@viewdetail'));
Route::get('/getstudents', array('before' => 'old', 'uses' => 'DoctorController@getStudent'));
Route::post('student-health-medical-detail',array('before' => 'old','uses' =>'DoctorController@studenthealthmedicaldetail'));
Route::get('/student-general-assessment', array('before' => 'old', 'uses' => 'DoctorController@general_assessment'));
Route::post('student-general-assessment', array('before' => 'old', 'uses' => 'DoctorController@post_general_assessment'));
Route::get('/student-growth-development-assessment', array('before' => 'old', 'uses' => 'DoctorController@growth_development_assessment'));
Route::post('student-growth-development-assessment', array('before' => 'old', 'uses' => 'DoctorController@post_growth_development_assessment'));
Route::get('/student-vision-assessment', array('before' => 'old', 'uses' => 'DoctorController@vision_assessment'));
Route::post('student-vision-assessment', array('before' => 'old', 'uses' => 'DoctorController@post_vision_assessment'));
Route::get('/student-sports-fitness-assessment', array('before' => 'old', 'uses' => 'DoctorController@sports_fitness_assessment'));
Route::post('student-sports-fitness-assessment', array('before' => 'old', 'uses' => 'DoctorController@post_sports_fitness_assessment'));
Route::get('/student-learning-disability-assessment', array('before' => 'old', 'uses' => 'DoctorController@learning_disability_assessment'));
Route::post('student-learning-disability-assessment', array('before' => 'old', 'uses' => 'DoctorController@post_learning_disability_assessment'));
Route::get('/student-hearing-assessment', array('before' => 'old', 'uses' => 'DoctorController@hearing_assessment'));
Route::post('student-hearing-assessment', array('before' => 'old', 'uses' => 'DoctorController@post_hearing_assessment'));
Route::get('/doctor-recommendation', array('before' => 'old', 'uses' => 'DoctorController@doctor_recommendation'));
Route::post('doctor-recommendation', array('before' => 'old', 'uses' => 'DoctorController@post_doctor_recommendation'));

/********************************** ***************Teacher SECTION*************************************************/

Route::get('/teachers', array('before' => 'old', 'uses' => 'TeacherController@index'));
Route::get('teacher/{id}/edit', 'TeacherController@edit');
Route::post('/teacher/update', 'TeacherController@update');
Route::get('/add-teacher', array('before' => 'old', 'uses' => 'TeacherController@create'));
Route::post('/add-teacher', array('before' => 'old', 'uses' => 'TeacherController@store'));
Route::get('/add-daily-home-work', array('before' => 'old', 'uses' => 'TeacherController@addDailyhomework'));
Route::post('/add-daily-home-work', array('before' => 'old', 'uses' => 'TeacherController@storeDailyhomework'));



//Send Message 
Route::get('/messages', array('before' => 'old', 'uses' => 'MessageController@message'));
Route::post('/messages', array('before' => 'old', 'uses' => 'MessageController@send_message'));
Route::get('/getusers', array('before' => 'old', 'uses' => 'MessageController@getUsers'));
Route::get('/report',array('before' => 'old', 'uses' => 'ReportController@index'));

// Logging in and out
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');
get('/auth/register', 'Auth\AuthController@getRegister');
