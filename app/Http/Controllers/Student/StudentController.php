<?php
	
	namespace App\Http\Controllers\Student;
	
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Library\Crostutor;
	use Illuminate\Support\Facades\Validator;
	use Artisan;
	use Toastr;
	class StudentController extends Controller
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
		
    public function usermessage(){
			$Crostutor = new Crostutor();
			$response = $Crostutor->usermessage(session('uid'),session('token'));
			if($response['status'] == 403){
				redirect(url('/logout'))->send();
				}else if($response['status'] !=0){
				return view('error',['errorMessage'=>$response['message']]);
				
			}
			/*print_r($response);
				die;
			*/           
			 $this->usermessage = $response['message'];
		}
		
    public function dashboard(Request $req)
    { 
			return redirect(url('student/my?req=4'));
			$Crostutor = new Crostutor();
			$questions = $Crostutor->my_question(session('uid'),session('token'),0,1,0);
      
			$data['questions']=[];
			$data['last_id'] = 0;
			if(!empty($questions['message']) && $questions['status']=='0'){
				/* echo '<pre>';
					print_r($questions);
				die;*/
				$data['questions']=$questions['message'];
				end($data['questions']);         
				$last_key = key($data['questions']); 
				if( $last_key==19 ){
					$data['last_id'] = $data['questions'][$last_key]['id'];  
				}
			}
			/*            echo "<pre>";
				print_r($data['questions']);
			die;*/
			
			$this->userdetails();
			$this->usermessage();
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			$data['usermessageflag'] = $this->usermessageflag;
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
			$school = $Crostutor->basic(1);
			$data['schools']=[];
			if(!empty($school['message'])){
				$data['schools']=$school['message'];
			}
			return view('student/dashboard',$data);
		}
    public function myprofile()
    {   
			$Crostutor = new Crostutor();
			$this->userdetails();
			$this->usermessage();
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			if(!isset($data['userdetails']['profile']['schoolId'])){
				$data['userdetails']['profile']['schoolId']="";
			}
			$data['usermessageflag'] = $this->usermessageflag;
			$school = $Crostutor->basic(1);
			$data['schools']=[];
			if(!empty($school['message'])){
				$data['schools']=$school['message'];
			}
			return view('student/myprofile',$data);
		}
    public function postquestion()
    {   
			$Crostutor = new Crostutor();
			$this->userdetails();
			$this->usermessage();
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			$data['usermessageflag'] = $this->usermessageflag;
			$subject = $Crostutor->basic(4);
			if(!empty($subject['message'])){
				$data['subjects']=$subject['message'];
				/*echo "<pre>";
					print_r($data['subjects']);
				echo "</pre>";*/
			}
			return view('student/postquestion',$data);
		}
		public function questiondetail($question_id)
    {   
			$Crostutor = new Crostutor();
			$data['question_id'] = ($question_id);                   //url_lujin
			$question = $Crostutor->stu_question($data['question_id']);
			$data['answered_user']=[]; 
			$data['uid2'] = '';
			$data['answerer']=[];
			$data['otherparsson'] = true;
			/* print_r($question);
			die; */
			
			if(isset($question['message']['answerer'])){
				if(($question['message']['answerer'] == session('uid'))){
					$data['otherparsson'] = false;
				}
				$data['uid2'] = $question['message']['answerer'];
				$answered_user = $Crostutor->userdetails(session('uid'),session('token'),$data['uid2']);
				$data['answerer']=$answered_user['message'];
			}
			if(isset($question['message']['answer']['uid'])){
				$data['uid2'] = $question['message']['answer']['uid'];
				if($question['message']['answer']['uid'] == session('uid')){
					$data['otherparsson'] = false;
				}
				$answered_user = $Crostutor->userdetails(session('uid'),session('token'),$question['message']['answer']['uid']);
				$data['answered_user']=$answered_user['message'];
			}
			
			
			//$data['unlock']=0;
			$data['unlock']=1;
			if(session('uid')==$question['message']['uid']){
				$data['unlock']=1;
				$data['otherparsson'] = false;
			}
			$data['question']=$question['message'];
			//		 echo "<pre>";
       // print_r($data['answered_user']);
      //  echo "</pre>";
			//die; 
			$this->userdetails();
			$this->usermessage();
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			$data['usermessageflag'] = $this->usermessageflag;
		
			if(count($data['answerer'])==0)
			{
				$data['answerer']['username']="a";
				$data['answerer']['email']="a";
			}
			return view('student/questiondetail',$data);
		}
		
    public function answerquestions()
    {
			return view('student/answerquestions');
		}
    public function cardpayment()
    {
			return view('student/cardpayment');
		}  
    public function disputedisplay($dispute_id)
    {
			$Crostutor = new Crostutor();
			$this->userdetails();
			$this->usermessage();
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			$data['usermessageflag'] = $this->usermessageflag;
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
			$parameter = array(
			'uid'           =>session('uid'),
			'token'         =>session('token'),
			'id'            =>($dispute_id),
			);
			$data['dispute']=[];
			$data['student']=[];
			$data['tutor']=[];
			
			$response = $Crostutor->dispute_detail($parameter);
			if($response['status']=="0"){
				$data['dispute'] = $response['message'];
				$request=$Crostutor->stu_question($response['message']['question_id']);
				$data['question'] = $request['message'];
				$question = $Crostutor->stu_question($response['message']['question_id']);
				if($question['message']['uid']!=session('uid')){
					return redirect('student/dashboard');   
				}
				$data['student']=$this->userdetail;
				if(isset($question['message']['answerer'])){
					$answered_user = $Crostutor->userdetails(session('uid'),session('token'),$question['message']['answerer']);
					$data['tutor']=$answered_user['message'];
					
				}
			}
			/*        echo "<pre>";
        print_r($data['question']);
        //print_r($data['student']);
			echo "</pre>";*/
			return view('student/disputedisplay',$data);
		}
    public function disputesystem()
    {
			return view('student/disputesystem');
		}
    public function sharelink()
    {   
			$Crostutor = new Crostutor();
			$this->userdetails();
			$this->usermessage();
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			$data['usermessageflag'] = $this->usermessageflag;
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
			$parameter = array(
			'uid'           =>session('uid'),
			'token'         =>session('token'),
			);        
			$response = $Crostutor->share_link($parameter);
			$data['share']=$response['message'];
			/*        echo'<pre>';
        print_r($response);
			echo'</pre>';*/
			return view('student/sharelink',$data);
		}
    public function topup()
    {   
			$this->userdetails();
			$this->usermessage();
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			$data['usermessageflag'] = $this->usermessageflag;
			
			return view('student/topup',$data);
		}
		
    public function createdispute($question_id){
			$this->userdetails();
			$this->usermessage();
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			$data['usermessageflag'] = $this->usermessageflag;       
			$data['question']=$question_id;
			return view('student/createdispute',$data);
		}
		
    public function massagessuccess()
    {
			return view('student/massagessuccess');
		}
    public function massageserror()
    {
			return view('student/massageserror');
		}
    public function studentcompleted()
    {
			return view('student/studentcompleted');
		}
    public function studentmyquestions()
    {
			return view('student/studentmyquestions');
		}  
    public function update_avatar(Request $req){
			$Crostutor = new Crostutor();
			
			$validator = Validator::make($req->all(), [
			'avatar_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			if($validator->fails()){
				return redirect()->back()->withErrors($validator);
				
				}else{
				if ($req->hasFile('avatar_img')) {
					$image = $req->file('avatar_img');
					/*$name = rand().time().'.'.$image->getClientOriginalExtension();
						$destinationPath = public_path('/images/student');
						$image->move($destinationPath, $name);
					$path=url('/images/student').'/'.$name;*/
					/*   echo "<pre>";
						print_r($image);
					die;*/
					
					$image_path = $image->getPathname();
					$image_mime = $image->getmimeType();
					$image_org  = $image->getClientOriginalName();
					
					$path = $Crostutor->upload_file(session('uid'),session('token'),$image_path,$image_mime,$image_org);
					
					
					if($path['status']==0){
						$response = $Crostutor->update_student_avatar(session('uid'),session('token'),$path['message']);
						if($response['status']==0){
							Toastr::success('Profile picture updated successfully.', 'Success', ['options']);
							}else{
							Toastr::error($response['message'], 'Error', ['options']);
						}
					}
					else{
						Toastr::error($path['message'], 'Error', ['options']);
					}
				}
				else{
					Toastr::error('Error while updating profile picture.', 'Error', ['options']);
				}
				return redirect()->back();
			}
		}
		public function complete(Request $req){
			$Crostutor = new Crostutor();
			$parameter = array('uid' =>session('uid'),'token' =>session('token'));
			$parameter['school_id'] = $req->get('school');
			$parameter['avatar'] = $req->get('avatar');
			
			$response = $Crostutor->complete_student($parameter);
			return response()->json($response);
			
		}
		
    public function change_password(Request $req){
			$Crostutor = new Crostutor();
			$validator = Validator::make($req->all(), [
			'password'           => 'required',
			'new_password'       => 'required',
			're_new_password'    => 'required|same:new_password'
			]);
			if($validator->fails()){
				Toastr::error('Error while updating password.', 'Error', ['options']);
				return redirect()->back()->withErrors($validator);
			}
			else{
				$old_password = $req->get('password');
				$new_password = $req->get('new_password');
				$response = $Crostutor->change_password(session('uid'),session('token'),$old_password,$new_password);
				
				if($response['status']==0){
					Toastr::success('Password updated successfully.', 'Success', ['options']);
					
					}else{
					Toastr::error($response['message'], 'Error', ['options']);
					
				}
			}
			return redirect()->back();
		} 
		
		public function profile_update(Request $req){
			$Crostutor = new Crostutor();
			$validator = Validator::make($req->all(), [
			'school'           => 'required'
			]);
			if($validator->fails()){
				Toastr::error('Error while updating Details.', 'Error', ['options']);
				return redirect()->back()->withErrors($validator);
			}
			else{
				$response = $Crostutor->profile_update(session('uid'),session('token'),$req);
				if($response['status']==0){
					Toastr::success('Details updated successfully.', 'Success', ['options']);
					}else{
					Toastr::error('Error:'.$response['message'], 'Error', ['options']);
				}
			}
			return redirect()->back();
		} 
		
    public function postquestion_submit(Request $req){
			$Crostutor = new Crostutor();
			$validator = Validator::make($req->all(), [
			'subject'       => 'required',
			'academic_name' => 'required',
			'other_option'  => 'required',
			'course_number' => 'required',
			'type'          => 'required',
			'content'       => 'required',
			]);
			if($validator->fails()){
				return response()->json(['order_id'=>"",'error'=>"File Format not Support"]); 
			}
			else{
				
				
				$parameter = array(
				'uid'           =>session('uid'),
				'token'         =>session('token'),
				'subject'       =>$req->get('subject'),
				'level'         =>$req->get('academic_name'),
				'count'         =>$req->get('other_option'),
				'course'        =>strtoupper($req->get('course_number')),
				'type'          =>$req->get('type'),
				'content'       =>$req->get('content'),
				'files'          =>$req->get('files'),
				'images'        =>$req->get('images'),
				);
				$response = $Crostutor->postquestion_submit($parameter);
				if($response['status']==0){
					/* Toastr::success('Question posted successfully.', 'Success', ['options']);
						Toastr::success('Please make Payment to publish it.', 'Success', ['options']);
						Toastr::info('Question id:'.$response['message']['id'], 'Success', ['options']);
					Toastr::info('order id:'.$response['message']['oid'], 'Success', ['options']);*/
					
					$q_id=($response['message']['id']);		// Modified by Vadik
					$o_id=($response['message']['oid']);
					//return redirect(url('/student/payment/'.$q_id.'/'.$o_id));
					$parameter_cost = array(
					'uid'           =>session('uid'),
					'token'         =>session('token'),
					'subject'       =>$req->get('subject'),
					'level'         =>$req->get('academic_name'),
					'type'          =>$req->get('type'),
					'count'         =>$req->get('other_option'),
					);
					$exitCode = Artisan::call('view:clear');
					$cost = $Crostutor->cost_cac($parameter_cost);
					return response()->json(['status'=> $response['status'],'order_id'=>$response['message']['oid'],'q_id'=>$q_id,'user_id'=>session('uid'),'token'=>session('token'),'cost'=>$cost,'item_str'=>$req->get('subject').'-'.$req->get('academic_name').'-'.$req->get('other_option'),'error'=>'']);
					}else{
					$response['error'] = $response['message'];
					return response()->json($response); 
				}
			}
			
		} 
		
    public function payment($question_id,$order_id){
			$data['user_id']= session('uid');
			$data['token']= session('token');
			$data['order_id']= ($order_id);
			
			return view('student/payment',$data);
		}
		
    public function add_topup(Request $req){
			$Crostutor = new Crostutor();
			if($req->get('amount')>0){
        $parameter = array(
				'uid'           =>session('uid'),
				'token'         =>session('token'),
				'amount'       =>$req->get('amount')*100,
				);
        $order = $Crostutor->add_topup($parameter);
        $order['user_id']=session('uid');
        $exitCode = Artisan::call('view:clear');
        return response()->json($order);   
			}
			else{
        return response()->json(['status'=>"123"]); 
			}
			
		}
		
		public function ajax_load_dashboard(Request $req){
			if($req->get('temp')!="" && $req->get('temp')){
				$Crostutor = new Crostutor();
				if($req->get('key')){
					$parameter = array( 
					'uid'        => session('uid'),
					'token'      => session('token'),
					'subject'    => 0,
					'level'      => 0,
					'type'       => 0,
					);
					
					if($req->get('temp') && !empty($req->get('temp'))){
						$parameter['last_id']=$req->get('temp');
					}
					$questions = $Crostutor->question_list($parameter);
					}else{
					$questions = $Crostutor->my_question(session('uid'),session('token'),0,$req->get('req'),$req->get('temp'));
				}
				/*print_r($questions);
				die;*/
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
				
				$this->userdetails();
				$data['userdetails'] = $this->userdetail;
				$data['usermessageflag'] = $this->usermessageflag;
				$data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
				return view('student/ajax_dashboard',$data);
			}
			
		}
		
    public function send_comment(Request $req){
			/* $Crostutor = new Crostutor();
        if($req->get('amount')>0){
        $parameter = array(
				'uid'           =>session('uid'),
				'token'         =>session('token'),
				'amount'       =>$req->get('amount')*100,
				);
        $order = $Crostutor->add_topup($parameter);
        $order['user_id']=session('uid');
        return response()->json($order);   
        }
        else{
        return response()->json(['status'=>"123"]); 
			}*/
		//	print_r($_POST);
		//	die; 
			
		}
		public function pay_with_blance(Request $req){
			$Crostutor = new Crostutor();
			if($req->get('temp')){
        $parameter = array(
				'uid'           =>session('uid'),
				'token'         =>session('token'),
				'oid'           =>$req->get('temp'),
				);
        $exitCode = Artisan::call('view:clear');
        $response = $Crostutor->pay_with_blance($parameter);
        return response()->json($response);   
			}
			else{
        return response()->json(['status'=>"123",'message'=>"order id not found"]); 
			}
			
			
		}
		
    public function release(Request $req){
			$Crostutor = new Crostutor();
			if($req->get('review')){
        $parameter = array(
				'uid'           =>session('uid'),
				'token'         =>session('token'),
				'qid'           =>$req->get('qid'),
				'score'         =>$req->get('score'),
				'review'        =>$req->get('review')
				
				);
        if(!empty($req->get('experience'))){
					$parameter['experience'] = implode(',',$req->get('experience'));
				}
        $response = $Crostutor->release_question($parameter);
        if($response['status']==0){
					Toastr::success('Answer release successfully.', 'Success', ['options']);
					}else{
					Toastr::error('Error:'.$response['message'], 'Error', ['options']);
				}   
			}
			else{
				Toastr::error('Error:review content is required', 'Error', ['options']);
				return redirect()->back();
			}
			return redirect()->back();
			
		}
		
    public function my(Request $req){
			$Crostutor = new Crostutor();
			$questions = $Crostutor->my_question(session('uid'),session('token'),0,$req->get('req'),0);
			if($questions['status']!=0){
				return view('error',['errorMessage'=>$questions['message']]);	
			}


	//lujin
		//	echo '<pre>';
	//		print_r($questions);
		//	echo '</pre>';
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
			
			$data['req']=$req->get('req'); 
			$this->userdetails();
			$this->usermessage();
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			$data['usermessageflag'] = $this->usermessageflag;
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
			$school = $Crostutor->basic(1);
			$data['schools']=[];
			if(!empty($school['message'])){
				$data['schools']=$school['message'];
			}
			return view('student/my',$data);
		}
		
		
    public function dispute_submit(Request $req){
      $Crostutor = new Crostutor();
			$validator = Validator::make($req->all(), [
			'content'       => 'required',
			]);
			if($validator->fails()){
				Toastr::error('Error occure while submitting dispute', 'Error', ['options']);
				return redirect()->back()->withErrors($validator);
				}else{
				$parameter=array('uid'=>session('uid'),'content'=>$req->get('content'),'token'=>session('token'),'qid'=>($req->get('temp')));
				
				$parameter['files']=$req->get('files');
				$response = $Crostutor->dispute_question($parameter);
				if($response['status']==0){
					Toastr::success('Successfully Requested a dispute.', 'Success', ['options']);
					return redirect('student/disputedisplay/'.($response['message']['id']));
					}else{
					Toastr::error('Error:'.$response['message'], 'Error', ['options']);
					return redirect()->back();
				}       
			}
			
		}
    
    public function sharelink_with_email(Request $req){
			$Crostutor = new Crostutor();
			if($req->get('email_id')){
        $parameter = array(
				'uid'           =>session('uid'),
				'token'         =>session('token'),
				'emails'           =>$req->get('email_id'),
				);
        $response = $Crostutor->sharelink_with_email($parameter);
        if($response['status']==0){
					Toastr::success('Invitation send successfully', 'Success', ['options']);
					}else{
					Toastr::error('Error:'.$response['message'], 'Error', ['options']);
				}   
			}
			else{
				Toastr::error('Error:Email field is required', 'Error', ['options']);
				return redirect()->back();
			}
			return redirect()->back();
			
		}
		
    public function search(Request $req){
			$Crostutor = new Crostutor();
			$parameter = array( 
			'uid'        => session('uid'),
			'token'      => session('token'),
			'subject'    => 0,
			'level'      => 0,
			'type'       => 0,
			);
			
			$data['se_subject']="";
			$data['se_key']="";
			if($req->get('level') && !empty($req->get('level'))){
				$parameter['last_id']=$req->get('level');
			}
			if($req->get('subject') && !empty($req->get('subject'))){
				$parameter['subject']=$req->get('subject');
				$data['se_subject']=$req->get('subject');
			}
			if($req->get('key') && !empty($req->get('key'))){
				$parameter['key']=$req->get('key');
				$data['se_key']=$req->get('key');
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
			/*                      $subject = $Crostutor->basic(4);
				$data['subjects']=[];
				if(!empty($subject['message'])){
				$data['subjects'] = $subject['message'];
			} */ 
			$this->userdetails();
			$this->usermessage();
			$data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
			$data['message']=$this->usermessage;
			$data['userdetails'] = $this->userdetail;
			$data['usermessageflag'] = $this->usermessageflag;
			
			
		
			return view('student/search',$data);
			
			
		}    
	}	