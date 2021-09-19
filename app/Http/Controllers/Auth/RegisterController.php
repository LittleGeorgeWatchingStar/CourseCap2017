<?php
	
	namespace App\Http\Controllers\Auth;
	
	use App\User;
	use App\Library\Crostutor;
	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Foundation\Auth\RegistersUsers;
	use Illuminate\Http\Request;
	use Toastr;
	
	class RegisterController extends Controller
	{
    /*
			|--------------------------------------------------------------------------
			| Register Controller
			|--------------------------------------------------------------------------
			|
			| This controller handles the registration of new users as well as their
			| validation and creation. By default this controller uses a trait to
			| provide this functionality without requiring any additional code.
			|
		*/
		
    use RegistersUsers;
		
    /**
			* Where to redirect users after registration.
			*
			* @var string
		*/
    protected $redirectTo = '/';
		
    /**
			* Create a new controller instance.
			*
			* @return void
		*/
    public function __construct()
    {
			$this->middleware('guest');
		}
		
    /**
			* Get a validator for an incoming registration request.
			*
			* @param  array  $data
			* @return \Illuminate\Contracts\Validation\Validator
		*/
    protected function validator(array $data)
    {
			return Validator::make($data, [
			'username' => 'required|string|max:20|min:5',
			'email' => 'required|string|email|max:255',
			'password' => 'required|string|min:6',
			'pp' => 'required',
			]);
		}
		
    /**
			* Create a new user instance after a valid registration.
			*
			* @param  array  $data
			* @return \App\User
		*/
    protected function create(array $data)
    {
			return User::create([
			'username' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			]);
		}
    protected function checkavailability(Request $req)
    {
			if($req->get('type')){
				$Crostutor = new Crostutor();
				if($req->get('type') == 1){
					$response = $Crostutor->is_email_available($req->get('email'));
					}else{
					$response = $Crostutor->is_username_available($req->get('username'));
				}
				if($response){
					echo 'true';
					}else{
					echo 'false';
				}
        }else{
				echo 'Please Enter valid inputs.';
			}
			die;
			return response($res)
			->header('Content-Type', 'application/json');
		}
    public function register(Request $req){
			
			/* Taking all data from POST */
			$userData = array(
			'username'    =>  $req->get('username'),
			'email'   =>  $req->get('email'),
			'password'    =>  $req->get('password'),
			'pp'    =>  $req->get('pp'),
			'referral'    =>  $req->get('refId'),
			);
			
			/* Initializing validator */
			$validator  = $this->validator($userData);
			
			/* validating user input */
			if($validator->fails()){
				return redirect()->back()->withErrors($validator, 'signupErrors');
        }else{
				$userData['role']=0;
				$Crostutor = new Crostutor();
				$response = $Crostutor->register($userData);
				
				if(isset($response['status']) &&  $response['status'] == 0){
					$userData['uid']=$response['message']['uid'];
					$userData['token']=$response['message']['token'];
					//session('userdata',$userData);
					$parameter = array(
					'email'   =>  $req->get('email'),
					'password'    =>  $req->get('password'),
					);
					$response1 = $Crostutor->login($parameter);
					if(isset($response1['status']) &&  $response1['status'] == 0){
						$userData1 = array_merge($response1['message'],$parameter);
						$userData1['usertype'] = $response1['message']['role'] == 1 ? 'teacher' : 'student' ; 
						session($userData1);
						Toastr::success('Account created successfully.', 'Success', ['options']);
						if($req->get('cr')== 'questiondetail'){
							return redirect($req->get('cu'));
						}
						return redirect(url('student/dashboard'));
					}
					
					return redirect(url('/'));
					
					}else{              
					$validator->errors()->add('custom_error', $response['message']);     
					return redirect()->back()->withErrors($validator, 'signupErrors');
				}
			}
		}
		
		public function tut_register1(Request $req){
			
			/* Taking all data from POST */
			$userData = array(
			'username'    =>  $req->get('username'),
			'email'   =>  $req->get('email'),
			'password'    =>  $req->get('password'),
			'pp'    =>  $req->get('pp'),
			);
			
			/* Initializing validator */
			$validator  = $this->validator($userData);
			
			/* validating user input */
			if($validator->fails()){
				return redirect()->back()->withErrors($validator, 'tutorsignup');
        }else{
				$userData['role']=1;
				$Crostutor = new Crostutor();
				$response = $Crostutor->register($userData);
				
				if(isset($response['status']) &&  $response['status'] == 0){
					$userData['uid']=$response['message']['uid'];
					$userData['token']=$response['message']['token'];
					//session('userdata',$userData);
					$parameter = array(
					'email'   =>  $req->get('email'),
					'password'    =>  $req->get('password'),
					);
					$response1 = $Crostutor->login($parameter);
					if(isset($response1['status']) &&  $response1['status'] == 0){
						$userData1 = array_merge($response1['message'],$parameter);
						session($userData1);
						Toastr::success('Account created successfully.', 'Success', ['options']);
						return redirect(url('tutor/dashboard'));
					}
					
					return redirect(url('/'));
					}else{              
					$validator->errors()->add('custom_error', $response['message']);     
					return redirect()->back()->withErrors($validator, 'signupErrors');
				}
			}
		}
		public function tut_register(Request $req){
			
			/* Taking all data from POST */
			$userData = array(
			'username'    =>  $req->get('username'),
			'email'   =>  $req->get('email'),
			'password'    =>  $req->get('password'),
			'pp'    =>  $req->get('pp'),
			);
			
			/* Initializing validator */
			$validator  = $this->validator($userData);
			
			/* validating user input */
			if($validator->fails()){
				return redirect()->back()->withErrors($validator, 'tutorsignup');
        }else{
				$userData['role']=1;
				$Crostutor = new Crostutor();
				$response = $Crostutor->register($userData);
				
				if(isset($response['status']) &&  $response['status'] == 0){
					$userData['uid']=$response['message']['uid'];
					$userData['token']=$response['message']['token'];
					//session('userdata',$userData);
					$parameter = array(
					'email'   =>  $req->get('email'),
					'password'    =>  $req->get('password'),
					);
					$response1 = $Crostutor->login($parameter);
					if(isset($response1['status']) &&  $response1['status'] == 0){
						$userData1 = array_merge($response1['message'],$parameter);
						session($userData1);
						return redirect(url('tutor/dashboard'));
					}
					
					return redirect(url('/'));
					}else{              
					$validator->errors()->add('custom_error', $response['message']);     
					return redirect()->back()->withErrors($validator, 'signupErrors');
				}
			}
		}
		
    
    public function fb_register(Request $req){
			
			/* Taking all data from POST */
			$userData = array(
			'fb_id'    =>  $req->get('fb_id'),
			'fb_token'   =>  $req->get('fb_token'),
			'uid'    =>  $req->get('uid'),
			'username'    =>  $req->get('username').rand(),
			'email'    =>  $req->get('email'),
			'password'    =>  $req->get('uid'),
			'referral'    =>  $req->get('referral'),
			'role'      => 0
			);
			
			$Crostutor = new Crostutor();
			$response = $Crostutor->register($userData);
			
			if(isset($response['status']) &&  $response['status'] == 0){
				return response()->json(['status'=>"0",'message'=>"Acount created Sucessfully"]);
				}else{              
				return response()->json(['status'=>"101",'message'=>$response['message']]);
			}
			
		}
	}
