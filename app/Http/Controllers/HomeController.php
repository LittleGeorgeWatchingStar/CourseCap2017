<?php
	
	namespace App\Http\Controllers;
	
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Library\Crostutor;
	use Illuminate\Support\Facades\Validator;
	use Toastr;
	
	class HomeController extends Controller
	{
		public $userdetail = array();
		public $usermessage = array();
		public $usermessageflag = array('nothing','committed','uncommitted','answered','released','chatting','Not finish Payment','Certification passed','Not passed verification','','Remainder','dispute','');
		
		public function userdetails(){
			$Crostutor = new Crostutor();
			$response = $Crostutor->userdetails(session('uid'),session('token'));
			if($response['status'] == 403){
				redirect(url('/logout'))->send();
				}else if($response['status'] !=0){
				return view('error',['errorMessage'=>$response['message']]);
				
			}
			$parameter = array( 'uid'        => session('uid'),
			'token'      => session('token')
			);
			$sidebar = $Crostutor->static_web($parameter);
			$response['message']['sidebar']=$sidebar['message'];
			$response['message']['balance']=$response['message']['balance']/100;
			$this->userdetail = $response['message'];
		}
		public function privacy_policy(){
			if(session('uid') ){
				$this->userdetails();
				$this->usermessage();
				$data['message']=$this->usermessage;
				$data['userdetails'] = $this->userdetail;
				$data['usermessageflag'] = $this->usermessageflag;
				if(session('role') == 1){
					$data['header'] = 'authTutorHeader';
				}else{
					$data['header'] = 'authStudentHeader';
				}
			}else{
				$data['header'] = 'public_red_header';
			}
			return view('privacy',$data);
		}
		public function tac(){
			if(session('uid') ){
				$this->userdetails();
				$this->usermessage();
				$data['message']=$this->usermessage;
				$data['userdetails'] = $this->userdetail;
				$data['usermessageflag'] = $this->usermessageflag;
				if(session('role') == 1){
					$data['header'] = 'authTutorHeader';
				}else{
					$data['header'] = 'authStudentHeader';
				}
			}else{
				$data['header'] = 'public_red_header';
			}
			return view('tac',$data);
		}
		public function faq(){
			if(session('uid') ){
				$this->userdetails();
				$this->usermessage();
				$data['message']=$this->usermessage;
				$data['userdetails'] = $this->userdetail;
				$data['usermessageflag'] = $this->usermessageflag;
				if(session('role') == 1){
					$data['header'] = 'authTutorHeader';
				}else{
					$data['header'] = 'authStudentHeader';
				}
			}else{
				$data['header'] = 'public_red_header';
			}
			return view('faq',$data);
		}
		
		public function usermessage(){
			$Crostutor = new Crostutor();
			$response = $Crostutor->usermessage(session('uid'),session('token'));
			if($response['status'] == 403){
				redirect(url('/logout'))->send();
				}else if($response['status'] !=0){
				return view('error',['errorMessage'=>$response['message']]);
				
			}
			$this->usermessage = $response['message'];
		}
		
		
		public function questiondetail($question_id)
		{
			if(session('usertype') == 'student'){
				return redirect(url('student/questiondetail/'.$question_id));
			}
			$Crostutor = new Crostutor();
			$question_id = ($question_id);
			$question = $Crostutor->stu_question($question_id);
			
			
			$data['answered_user']=[]; 
			if(isset($question['message']['answer']['uid'])){
				$data['answered_user']=[1]; 
				/*  $answered_user = $Crostutor->userdetails($question['message']['answer']['uid']);
					$data['answered_user']=$answered_user['message'];
				*/
			}
			
			$data['unlock']=0;
			if(session('uid')==$question['message']['uid']){
				$data['unlock']=1;
			}
			$data['question']=$question['message'];
			       
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
			//print_r("HomeController126_______",$data);
			return view('/questiondetail',$data);
		}
		
		public function index()
		{		
			$Crostutor = new Crostutor();
			$subject = $Crostutor->basic(4);
			$data['subjects']=[];
			if(!empty($subject['message'])){
				$data['subjects'] = $subject['message'];
			}
			$parameter = array(
			'subject'    => 0,
			'level'      => 0,
			'type'       => 0,
			);
			$questions = $Crostutor->question_list($parameter);		//Vadik
			$data['questions']=[];

			$data['last_id'] = 0;
			$data['subject_have']=[];
			if(!empty($questions['message']) && $questions['message']!="invalid user id or token"){
				
			//	print_r($questions['message']);
			//	die;
				$data['questions']=$questions['message'];
				end($data['questions']);         
				$last_key = key($data['questions']); 
				if( $last_key==19 ){
					$data['last_id'] = $data['questions'][$last_key]['id'];  
				}
			}
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','SOLVED');
			$role = session('role');
			if(session('role') === 1){
				return redirect(url('tutor/dashboard'));
			}
			if(session('uid')){
				$this->userdetails();
				$this->usermessage();
				$data['message']=$this->usermessage;
				$data['userdetails'] = $this->userdetail;
				$data['usermessageflag'] = $this->usermessageflag;
			}
			
			$parameter = array( 'uid'        => "",
			'token'      => ""
			);
			$sidebar = $Crostutor->static_web($parameter);
			$data['sidebar']=$sidebar['message'];
		
			return view('home',$data);
		}
		
		public function ajax_load_dashboard(Request $req){
			$Crostutor = new Crostutor();
			$parameter = array(
			'subject'    => 0,
			'level'      => 0,
			'type'       => 0,
			);
			if($req->get('temp') && !empty($req->get('temp'))){
				$parameter['last_id']=$req->get('temp');
			}
			if($req->get('level') && !empty($req->get('level'))){
				$parameter['last_id']=$req->get('level');
			}
			if($req->get('subject') && !empty($req->get('subject'))){
				$parameter['subject']=$req->get('subject');
			}
			
			$questions = $Crostutor->question_list($parameter);
		
			$data['questions']=[];
			$data['last_id'] = 0;
			if(!empty($questions['message'])){
				$data['questions']=$questions['message'];
				end($data['questions']);         
				$last_key = key($data['questions']); 
				if( $last_key==19 ){
					$data['last_id'] = $data['questions'][$last_key]['id'];  
				}
			}
			/* echo "<pre>";
				print_r($data['questions']);
			die;*/
			$data['key']=0;
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','SOLVED');
			return view('ajax_dashboard',$data);
			
			
		}
		
		
		public function ajax_load_dashboard_key(Request $req){
			$Crostutor = new Crostutor();
			$parameter = array(
			'key'    => 0,
			);
			if($req->get('temp') && !empty($req->get('temp'))){
				$parameter['last_id']=$req->get('temp');
			}
			if($req->get('key') && !empty($req->get('key'))){
				$parameter['key']=$req->get('key');
			}
			$questions = $Crostutor->question_list($parameter);
			$data['questions']=[];
			$data['last_id'] = 0;
			if(!empty($questions['message'])){
				$data['questions']=$questions['message'];
				end($data['questions']);         
				$last_key = key($data['questions']); 
				if( $last_key==19 ){
					$data['last_id'] = $data['questions'][$last_key]['id'];  
				}
			}
			/* echo "<pre>";
				print_r($data['questions']);
			die;*/
			$data['key']=1;
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','SOLVED');
			return view('ajax_dashboard',$data);
			
			
		}
		public function create_attachement(Request $req){
			$Crostutor = new Crostutor();
			if(!$req->file('attachement')){
				return response()->json(['status'=>1,'error'=>'please upload a file.']); 
			}
			
			$validator = Validator::make($req->all(), [
			'attachement.*' => 'mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf|max:10000',
			], ['attachement.mimes'=>'file formate not supported','max'=>'file size should less then 10 MB.']);
			if($validator->fails()){
				$errors = $validator->getMessageBag()->toArray();
				foreach($errors as $error){
					return response()->json(['status'=>1,'error'=>is_array($error) ? implode(',', $error) : $error]); 
				}
				
			}
			else{
				$files=[];
				$images=[];
				$error=[];
				$img_count=0;
				$fil_count=0;
				$attachements=$req->file('attachement');        //	Modified by Vadik       
				if($attachements){
					foreach ($attachements as $attachement) {
						$attachement_path = $attachement->getPathname();
						$attachement_mime = $attachement->getmimeType();
						$attachement_org  = $attachement->getClientOriginalName();
						$path = $Crostutor->upload_file(session('uid'),session('token'),$attachement_path,$attachement_mime,$attachement_org);
						//echo $path['message'].'<br>';
						if($path['status']==0){
							$type=explode('/',$attachement_mime);
							if ($type[0]=='image') {
								$images[]= $path['message'];
								$img_count++; 
								}else{
								$files[]=$path['message'];
								$fil_count++;
							}
							}else{
							
							return response()->json(['status'=>1,'error'=>$path['message']]);
						}
					}
					return response()->json(['status'=>0,'files'=>$files,'images'=>$images,'img_count'=>$img_count,'fil_count'=>$fil_count]);
				}
			}
			
		}
		
	}
