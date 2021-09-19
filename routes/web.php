<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/',
            ['uses' => 'HomeController@index',
                'as' => 'home']
        );
Route::get( '/messages',
            ['uses' => 'FirebaseController@index',
                'as' => 'home']
        );
Route::post( '/ajax_load_dashboard',
            ['uses' => 'HomeController@ajax_load_dashboard',
                'as' => 'ajax_load_dashboard']
        );

Route::post( '/ajax_load_dashboard_key',
            ['uses' => 'HomeController@ajax_load_dashboard_key',
                'as' => 'ajax_load_dashboard_key']
        );

Route::post(
    '/checkavailability',
    ['uses' => 'Auth\RegisterController@checkavailability',
        'as' => 'checkavailability']
);

Route::get(
    '/questiondetail/{question_id}',
    ['uses' => 'HomeController@questiondetail',
        'as' => 'questiondetail']
    );

Route::get(
    '/privacy-policy',
    ['uses' => 'HomeController@privacy_policy',
        'as' => 'privacy_policy']
);
Route::get(
    '/terms-and-conditions',
    ['uses' => 'HomeController@tac',
        'as' => 'tac']
);
Route::get(
    '/faq',
    ['uses' => 'HomeController@faq',
        'as' => 'faq']
);
Route::get(
    '/become-tutor',
    ['uses' => 'TutorController@becomeTutor',
        'as' => 'becomeTutor']
);
Route::post(
'/create_attachement',
['uses' => 'HomeController@create_attachement',
    'as' => 'create_attachement']
);
Route::get(
    '/tutor/dashboard',
    ['uses' => 'Tutor\HomeController@dashboard',
        'as' => 'tutor-dashboard']
);
Route::get(
    '/tutor/application',
    ['uses' => 'Tutor\HomeController@application',
        'as' => 'tutor-application']
);
Route::get(
    'tutor/application/success',
    ['uses' => 'Tutor\HomeController@applicationSuccess',
        'as' => 'tutor-application-success']
);

Route::get(
    'tutor/tutorprofile',
    ['uses' => 'Tutor\HomeController@tutorprofile',
        'as' => 'tutorprofile']
);

Route::get(
    'tutor/committtedtasks',
    ['uses' => 'Tutor\HomeController@committtedtasks',
        'as' => 'committtedtasks']
);

Route::get(
    'tutor/disputes',
    ['uses' => 'Tutor\HomeController@disputes',
        'as' => 'disputes']
);
Route::post(
    'tutor/ajax_load_dispute',
    ['uses' => 'Tutor\HomeController@ajax_load_dispute',
        'as' => 'ajax_load_dispute']
);
Route::get(
    'tutor/disputesdeatil',
    ['uses' => 'Tutor\HomeController@disputesdeatil',
        'as' => 'disputesdeatil']
);
Route::get(
    'tutor/completed',
    ['uses' => 'Tutor\HomeController@completed',
        'as' => 'completed']
);
Route::get(
    'tutor/commitquestion',
    ['uses' => 'Tutor\HomeController@commitquestion',
        'as' => 'commitquestion']
);

Route::get(
    'tutor/questiondetail',
    ['uses' => 'Tutor\HomeController@questiondetail',
        'as' => 'questiondetail']
);

Route::get(
    'tutor/answerquestions',
    ['uses' => 'Tutor\HomeController@answerquestions',
        'as' => 'answerquestions']
);

Route::get(
    'student/dashboard',
    ['uses' => 'Student\StudentController@dashboard',
        'as' => 'dashboard']
);

Route::get(
    'student/myprofile',
    ['uses' => 'Student\StudentController@myprofile',
        'as' => 'myprofile']
);

Route::get(
    'student/postquestion',
    ['uses' => 'Student\StudentController@postquestion',
        'as' => 'postquestion']
);

Route::get(
    'student/answerquestions',
    ['uses' => 'Student\StudentController@answerquestions',
        'as' => 'answerquestions']
);
Route::get(
    'student/cardpayment',
    ['uses' => 'Student\StudentController@cardpayment',
        'as' => 'cardpayment']
);

Route::get(
    'student/createdispute',
    ['uses' => 'Student\StudentController@createdispute',
        'as' => 'createdispute']
);
Route::get(
    'student/disputedisplay',
    ['uses' => 'Student\StudentController@disputedisplay',
        'as' => 'disputedisplay']
);

Route::get(
    'student/disputesystem',
    ['uses' => 'Student\StudentController@disputesystem',
        'as' => 'disputesystem']
);
Route::post(
    '/tut_register',
    ['uses' => 'Auth\RegisterController@tut_register',
        'as' => 'tut_register']
);
Route::post(
    '/register',
    ['uses' => 'Auth\RegisterController@register',
        'as' => 'register']
);

Route::post(
    '/fb_register',
    ['uses' => 'Auth\RegisterController@fb_register',
        'as' => 'fb_register']
);

Route::post(
    '/login',
    ['uses' => 'Auth\LoginController@login',
        'as' => 'register']
);

Route::post(
    '/fb_login',
    ['uses' => 'Auth\LoginController@fb_login',
        'as' => 'register']
);

Route::post(
    '/reset_password',
    ['uses' => 'Auth\ResetPasswordController@reset_mypassword',
        'as' => 'reset_password']
);
Route::get(
    '/become-tutor',
    ['uses' => 'TutorController@becomeTutor',
        'as' => 'becomeTutor']
);
Route::get(
    '/logout',
    ['uses' => 'TutorController@logout',
        'as' => 'logout']
);
Route::middleware(['tutor'])->group(function () {  

    Route::get(
        '/tutor/dashboard',
        ['uses' => 'Tutor\HomeController@dashboard',
            'as' => 'tutor-dashboard']
    );

    Route::get(
        '/tutor/search',
        ['uses' => 'Tutor\HomeController@search',
            'as' => 'tutor-search']
    );

    Route::post(
    'tutor/ajax_load_dashboard',
    ['uses' => 'Tutor\HomeController@ajax_load_dashboard',
        'as' => 'ajax_load_dashboard']
    );
    Route::get(
        '/tutor/application',
        ['uses' => 'Tutor\HomeController@application',
            'as' => 'tutor-application']
    );
    Route::get(
        'tutor/application/success',
        ['uses' => 'Tutor\HomeController@applicationSuccess',
            'as' => 'tutor-application-success']
    );

    Route::get(
        'tutor/tutorprofile',
        ['uses' => 'Tutor\HomeController@tutorprofile',
            'as' => 'tutorprofile']
    );

    Route::get(
        'tutor/committtedtasks',
        ['uses' => 'Tutor\HomeController@committtedtasks',
            'as' => 'committtedtasks']
    );

    Route::get(
        'tutor/disputes',
        ['uses' => 'Tutor\HomeController@disputes',
            'as' => 'disputes']
    );

    Route::get(
        'tutor/disputedisplay/{dispute_id}',
        ['uses' => 'Tutor\HomeController@disputedisplay',
            'as' => 'disputedisplay']
    );
    Route::get(
        'tutor/completed',
        ['uses' => 'Tutor\HomeController@completed',
            'as' => 'completed']
    );
    Route::get(
        'tutor/commitquestion',
        ['uses' => 'Tutor\HomeController@commitquestion',
            'as' => 'commitquestion']
    );

    Route::get(
        'tutor/questiondetail',
        ['uses' => 'Tutor\HomeController@questiondetail',
            'as' => 'questiondetail']
    );

    Route::get(
        'tutor/answerquestions',
        ['uses' => 'Tutor\HomeController@answerquestions',
            'as' => 'answerquestions']
    );

    Route::get(
        'tutor/questiondetail/{question_id}',
        ['uses' => 'Tutor\HomeController@questiondetail',
            'as' => 'questiondetail']
    );
    
    Route::post(
    'tutor/commit',
    ['uses' => 'Tutor\HomeController@commit',
        'as' => 'commit']
    );

    Route::post(
        'tutor/update_avatar',
        ['uses' => 'Tutor\HomeController@update_avatar',
            'as' => 'update_avatar']
    );

    Route::post(
        'tutor/change_password',
        ['uses' => 'Tutor\HomeController@change_password',
            'as' => 'change_password']
    );
    
    Route::post(
    'tutor/profile_update',
    ['uses' => 'Tutor\HomeController@profile_update',
        'as' => 'profile_update']
    );
	Route::post(
    'tutor/step_profile',
    ['uses' => 'Tutor\HomeController@tutor_step_profile',
        'as' => 'step_profile']
    );

    Route::post(
    'tutor/tutor_profile_update',
    ['uses' => 'Tutor\HomeController@tutor_profile_update',
        'as' => 'tutor_profile_update']
    );
    
    Route::post(
    'tutor/update_profs',
    ['uses' => 'Tutor\HomeController@update_profs',
        'as' => 'update_profs']
    );
	Route::post(
    'tutor/update_step_profs',
    ['uses' => 'Tutor\HomeController@update_step_profs',
        'as' => 'update_step_profs']
    );
    
    Route::post(
    'tutor/withdraw',
    ['uses' => 'Tutor\HomeController@withdraw',
        'as' => 'withdraw']
    );

    Route::post(
    'tutor/answerquestion_submit',
    ['uses' => 'Tutor\HomeController@answerquestion_submit',
        'as' => 'answerquestion_submit']
    );

    Route::get(
    'tutor/my',
    ['uses' => 'Tutor\HomeController@my',
        'as' => 'my']
    ); 

    Route::any(
    'tutor/ajax_load_my',
    ['uses' => 'Tutor\HomeController@ajax_load_my',
        'as' => 'ajax_load_my']
    );

    Route::post(
    'tutor/reply_submit',
    ['uses' => 'Tutor\HomeController@reply_submit',
        'as' => 'reply_submit']
    );
});
Route::middleware(['student'])->group(function () {  

    Route::get(
        'student/dashboard',
        ['uses' => 'Student\StudentController@dashboard',
            'as' => 'dashboard']
    );

    Route::get(
        'student/myprofile',
        ['uses' => 'Student\StudentController@myprofile',
            'as' => 'myprofile']
    );

    Route::get(
        'student/postquestion',
        ['uses' => 'Student\StudentController@postquestion',
            'as' => 'postquestion']
    );

    Route::get(
        'student/answerquestions',
        ['uses' => 'Student\StudentController@answerquestions',
            'as' => 'answerquestions']
    );
    Route::get(
        'student/cardpayment',
        ['uses' => 'Student\StudentController@cardpayment',
            'as' => 'cardpayment']
    );

    Route::get(
        'student/createdispute',
        ['uses' => 'Student\StudentController@createdispute',
            'as' => 'createdispute']
    );
    Route::get(
        'student/disputedisplay/{dispute_id}',
        ['uses' => 'Student\StudentController@disputedisplay',
            'as' => 'disputedisplay']
    );

    Route::get(
        'student/disputesystem',
        ['uses' => 'Student\StudentController@disputesystem',
            'as' => 'disputesystem']
    );

    Route::get(
        'student/sharelink',
        ['uses' => 'Student\StudentController@sharelink',
            'as' => 'sharelink']
    );

    Route::get(
        'student/topup',
        ['uses' => 'Student\StudentController@topup',
            'as' => 'topup']
    );

    Route::get(
        'student/massageserror',
        ['uses' => 'Student\StudentController@massageserror',
            'as' => 'massageserror']
    );

    Route::get(
        'student/massagessuccess',
        ['uses' => 'Student\StudentController@massagessuccess',
            'as' => 'massagessuccess']
    );

    Route::get(
        'student/studentcompleted',
        ['uses' => 'Student\StudentController@studentcompleted',
            'as' => 'studentcompleted']
    );

    Route::get(
        'student/studentmyquestions',
        ['uses' => 'Student\StudentController@studentmyquestions',
            'as' => 'studentmyquestions']
    );

    Route::post(
        'student/update_avatar',
        ['uses' => 'Student\StudentController@update_avatar',
            'as' => 'update_avatar']
    );

    Route::post(
        'student/change_password',
        ['uses' => 'Student\StudentController@change_password',
            'as' => 'change_password']
    );
    
    Route::post(
    'student/profile_update',
    ['uses' => 'Student\StudentController@profile_update',
        'as' => 'profile_update']
    );

    Route::post(
    'student/postquestion_submit',
    ['uses' => 'Student\StudentController@postquestion_submit',
        'as' => 'postquestion_submit']
    );
	Route::post(
    'student/complete',
    ['uses' => 'Student\StudentController@complete',
        'as' => 'complete']
    );

     Route::get(
    'student/payment/{question_id}/{order_id}',
    ['uses' => 'Student\StudentController@payment',
        'as' => 'payment']
    );
     
     Route::post(
    'student/add_topup',
    ['uses' => 'Student\StudentController@add_topup',
        'as' => 'add_topup']
    );

    Route::get(
    'student/questiondetail/{question_id}',
    ['uses' => 'Student\StudentController@questiondetail',
        'as' => 'questiondetail']
    );
    Route::post(
    'student/ajax_load_dashboard',
    ['uses' => 'Student\StudentController@ajax_load_dashboard',
        'as' => 'ajax_load_dashboard']
    );
	
    Route::post(
    'student/pay_with_blance',
    ['uses' => 'Student\StudentController@pay_with_blance',
        'as' => 'pay_with_blance']
    );
    Route::post(
        'student/release',
        ['uses' => 'Student\StudentController@release',
            'as' => 'release']
    );

    Route::get(
    'student/my',
    ['uses' => 'Student\StudentController@my',
        'as' => 'my']
    );

    Route::get(
    'student/createdispute/{question_id}',
    ['uses' => 'Student\StudentController@createdispute',
        'as' => 'createdispute']
    );

    Route::post(
    'student/dispute_submit',
    ['uses' => 'Student\StudentController@dispute_submit',
        'as' => 'dispute_submit']
    ); 

    
    Route::post(
    'student/sharelink_with_email',
    ['uses' => 'Student\StudentController@sharelink_with_email',
        'as' => 'sharelink_with_email']
    );
    
    Route::get(
    'student/search',
    ['uses' => 'Student\StudentController@search',
        'as' => 'search']
    );


});

	Route::post(
    'getchat',
    ['uses' => 'FirebaseController@getchat',
        'as' => 'getchat']
    );
    

    Route::post(
    'send_comment',
    ['uses' => 'FirebaseController@send_comment',
        'as' => 'send_comment']
    );

