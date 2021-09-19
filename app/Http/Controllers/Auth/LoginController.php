<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Library\Crostutor;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'loginemail' => 'required|string|email|max:255',
            'loginpassword' => 'required|string|min:6',
        ]);
    }
    public function login(Request $req){
        
        /* Taking all data from POST */
        $userData = array(
          'email'   =>  $req->get('loginemail'),
          'password'    =>  $req->get('loginpassword'),
        );
    
        /* Initializing validator */
        $validator  = $this->validator($req->all());
        
        /* validating user input */
        if($validator->fails()){
            return redirect()->back()->withErrors($validator, 'loginErrors');
        }else{
            
            $Crostutor = new Crostutor();
            $response = $Crostutor->login($userData);
            if(isset($response['status']) &&  $response['status'] == 0){
                $userData = array_merge($response['message'],$userData);
								$userData['usertype'] = $response['message']['role'] == 1 ? 'teacher' : 'student' ; 
                session($userData);
                if($req->get('cr')== 'questiondetail'){
									return redirect($req->get('cu'));
								}
                return redirect(url('student/dashboard'));
            }else{              
                 $validator->errors()->add('custom_error', $response['message']);     
                return redirect()->back()->withErrors($validator, 'loginErrors');
            }
        }
    }
    public function fb_login(Request $req){
            $parameter = array("fb_id"      =>$req->get('fb_id'),
                                "fb_token"  =>$req->get('fb_token'),
                                "uid"       =>$req->get('uid')
                                );
            $Crostutor = new Crostutor();
            $response = $Crostutor->fb_login($parameter);
            if($response['message']['needSignUp']!='true'){
                $userData = $response['message'];
                session($userData);
                return response()->json(['status'=>"0",'message'=>"sucessfully login"]);
            }else{              
                return response()->json(['status'=>"101",'message'=>"you have to signup first"]);
            }
        
    }
}
