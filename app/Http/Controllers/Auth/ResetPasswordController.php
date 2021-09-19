<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Library\Crostutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Toastr;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
        ]);
    }

    public function reset_mypassword(Request $req){
        
        /* Taking all data from POST */
        $userData = array(
          'email'   =>  $req->input('email'),
        );
    
        /* Initializing validator */
        $validator  = $this->validator($req->all());
        
        /* validating user input */
        if($validator->fails()){
            return redirect()->back()->withErrors($validator, 'forgetPasswordErrors');
        }else{
            $Crostutor = new Crostutor();
            $response = $Crostutor->reset_password($userData);
            if(isset($response['status']) &&  $response['status'] == 0){
                Toastr::success('we have sent an password reset link to your email-id.please check your email id.', 'Success', ['options']);
                return redirect(url('/'));
                
            }else{              
                 $validator->errors()->add('custom_error', $response['message']);     
                return redirect()->back()->withErrors($validator, 'forgetPasswordErrors');
            }
        }
    }
}
