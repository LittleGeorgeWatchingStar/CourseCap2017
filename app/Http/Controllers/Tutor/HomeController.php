<?php
	
namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Crostutor;
use Illuminate\Support\Facades\Validator;
use Toastr;
use Artisan;

class HomeController extends Controller
{
    
public $userdetail = array();
    public $usermessage = array();
    public $usermessageflag = array('nothing','committed','uncommitted','answered','released','chatting','Not finish Payment','Certification passed','Not passed verification','','Remainder','dispute','');

	public function userdetails(){
		$Crostutor = new Crostutor();
		return $Crostutor->userdetails(session('uid'),session('token'));
		
	}
	public function static_web(){
		$Crostutor = new Crostutor();
		
		$parameter = array( 'uid'        => session('uid'),
		'token'      => session('token')
		);
		return $Crostutor->static_web($parameter);
		
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
*/            $this->usermessage = $response['message'];
    }

   public function dashboard(Request $req)
    {    

       	
	/* ---------- check tutor complete profile start ------------*/
		
		$response = $this->userdetails();
		$Crostutor = new Crostutor();
		if($response['status'] == 403){
			return redirect(url('/logout'));
		}else if($response['status'] !=0){
			return view('error',['errorMessage'=>$response['message']]);
			
		}else if($response['status'] ==0 && $response['message']['incomplete'] == true){
			$subjects = $Crostutor->basic(3);
			$data['subjects']=[];
			if(!empty($subjects['message'])){
				$data['subjects']=$subjects['message'];
			}
			$data['message']=$response['message'];
			return view('tutor/step2',$data);
		}
		$sidebar = $this->static_web();
		$response['message']['sidebar']=$sidebar['message'];
		$response['message']['balance']=$response['message']['balance']/100;
		$data['userdetails'] = $response['message'];
		/*------- check tutor complete profile end -------*/
		
        $parameter = array( 'uid'        => session('uid'),
                            'token'      => session('token'),
                            'subject'    => 0,
                            'level'      => 0,
                            'type'       => 0,
                             );
        $questions = $Crostutor->question_list($parameter);
 /*       print_r($questions);
        die;*/
        $data['questions']=[];
        $data['last_id'] = 0;
         $data['subject_have']=[];
        if(!empty($questions['message']) && $questions['message']!="invalid user id or token"){
            
/*                print_r($questions['message']);
                die;*/
                $data['questions']=$questions['message'];
                end($data['questions']);         
                $last_key = key($data['questions']); 
                if( $last_key==19 ){
                 $data['last_id'] = $data['questions'][$last_key]['id'];  
                }
            }
         $subject = $Crostutor->basic(4);
        if(!empty($subject['message'])){
            $data['subjects']=$subject['message'];
            /*echo "<pre>";
            print_r($data['subjects']);
            echo "</pre>";*/
        }
            
        $this->userdetails();
        $this->usermessage();
        $data['message']=$this->usermessage;
        if(isset($data['userdetails']['profile'])){
            $data['subject_have']=explode(',',$data['userdetails']['profile']['subjects']);
         }
        $data['usermessageflag'] = $this->usermessageflag;
           // echo "<pre>";
            //print_r($data);
            //echo "/<pre>";
           // die;
        $data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
        return view('tutor/dashboard',$data);
    }

    public function application()
    {
        return view('tutor/applications');
    }
     public function applicationSuccess()
    {
        return view('tutor/applicationSuccess');
    }
    public function tutorprofile()
    {   
         $Crostutor = new Crostutor();
       	
	/* ---------- check tutor complete profile start ------------*/
		
		$response = $this->userdetails();
		$Crostutor = new Crostutor();
		if($response['status'] == 403){
			return redirect(url('/logout'));
		}else if($response['status'] !=0){
			return view('error',['errorMessage'=>$response['message']]);
			
		}else if($response['status'] ==0 && $response['message']['incomplete'] == true){
			$subjects = $Crostutor->basic(3);
			$data['subjects']=[];
			if(!empty($subjects['message'])){
				$data['subjects']=$subjects['message'];
			}
			$data['message']=$response['message'];
			return view('tutor/step2',$data);
		}
		$sidebar = $this->static_web();
		$response['message']['sidebar']=$sidebar['message'];
		$response['message']['balance']=$response['message']['balance']/100;
		$data['userdetails'] = $response['message'];
		/*------- check tutor complete profile end -------*/
        $this->usermessage();
/*        echo '<pre>';
        print_r($this->userdetail);
        echo '</pre>';*/
        $data['message']=$this->usermessage;
        $data['selected_subject'] = [];
        if(!isset($data['userdetails']['profile']['school'])){
            $data['userdetails']['profile']['school']="";
        }
        if(isset($data['userdetails']['profile']['subjects'])){
            $data['selected_subject'] = explode(',',$data['userdetails']['profile']['subjects']);

        }
        $subject = $Crostutor->basic(4);
        if(!empty($subject['message'])){
            $data['subjects']=$subject['message'];
        }
        $data['usermessageflag'] = $this->usermessageflag;
            $school = $Crostutor->basic(1);
            $data['schools']=[];
            if(!empty($school['message'])){
                $data['schools']=$school['message'];
            }

        return view('tutor/tutorprofile',$data);
    }

    public function committtedtasks()
    {
        return view('tutor/committtedtasks');
    }
    public function disputes()
    {   
        	
	/* ---------- check tutor complete profile start ------------*/
		
		$response = $this->userdetails();
		$Crostutor = new Crostutor();
		if($response['status'] == 403){
			return redirect(url('/logout'));
		}else if($response['status'] !=0){
			return view('error',['errorMessage'=>$response['message']]);
			
		}else if($response['status'] ==0 && $response['message']['incomplete'] == true){
			$subjects = $Crostutor->basic(3);
			$data['subjects']=[];
			if(!empty($subjects['message'])){
				$data['subjects']=$subjects['message'];
			}
			$data['message']=$response['message'];
			return view('tutor/step2',$data);
		}
		$sidebar = $this->static_web();
		$response['message']['sidebar']=$sidebar['message'];
		$response['message']['balance']=$response['message']['balance']/100;
		$data['userdetails'] = $response['message'];
		/*------- check tutor complete profile end -------*/
        $this->usermessage();
        $data['questions']=[];
        $data['page'] = 0;
        $Crostutor = new Crostutor();
        $parameter = array(
                                    'uid'           =>session('uid'),
                                    'token'         =>session('token'),
                                    'page'          =>0
                                     );

        $question = $Crostutor->my_dispute($parameter);
/*        echo "<pre>";
        print_r($question);
        echo "</pre>";*/
        $data['disput_status']=array('Open','Close');
        if (!empty($question['message'])) {
           $data['questions'] = $question['message'];
           if(count($data['questions'])==19){
            $data['page'] = 1;
           }
        }
        
        $subject = $Crostutor->basic(4);
         $data['subjects']=[];
        if(!empty($subject['message'])){
             $data['subjects'] = $subject['message'];
            }
        $data['message']=$this->usermessage;
        $data['usermessageflag'] = $this->usermessageflag;
        $data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
        return view('tutor/disputes',$data);
    }
    
    public function ajax_load_dispute(Request $req)
    {

      $data['questions']=[];
        $data['page'] = 0;
        $Crostutor = new Crostutor();
        $parameter = array(
                                    'uid'           =>session('uid'),
                                    'token'         =>session('token'),
                                    'page'          =>$req->get('temp')
                                     );

        $question = $Crostutor->my_dispute($parameter);
/*        echo "<pre>";
        print_r($question);
        echo "</pre>";*/
        $data['disput_status']=array('Open','Close');
        if (!empty($question['message'])) {
           $data['questions'] = $question['message'];
           if(count($data['questions'])==19){
            $data['page'] = $req->get('temp')+1;
           }
        }
        return view('tutor/ajax_load_dispute',$data);
    } 

    public function disputedisplay($dispute_id)
    {
        	
	/* ---------- check tutor complete profile start ------------*/
		
		$response = $this->userdetails();
		$Crostutor = new Crostutor();
		if($response['status'] == 403){
			return redirect(url('/logout'));
		}else if($response['status'] !=0){
			return view('error',['errorMessage'=>$response['message']]);
			
		}else if($response['status'] ==0 && $response['message']['incomplete'] == true){
			$subjects = $Crostutor->basic(3);
			$data['subjects']=[];
			if(!empty($subjects['message'])){
				$data['subjects']=$subjects['message'];
			}
			$data['message']=$response['message'];
			return view('tutor/step2',$data);
		}
		$sidebar = $this->static_web();
		$response['message']['sidebar']=$sidebar['message'];
		$response['message']['balance']=$response['message']['balance']/100;
		$data['userdetails'] = $response['message'];
		/*------- check tutor complete profile end -------*/
        $subject = $Crostutor->basic(4);
         $data['subjects']=[];
        if(!empty($subject['message'])){
             $data['subjects'] = $subject['message'];
            }
        $this->usermessage();
        $data['message']=$this->usermessage;
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
            $request=$Crostutor->stu_question($response['message']['question_id']);
            $data['question'] = $request['message'];
            $data['dispute'] = $response['message'];
            $question = $Crostutor->stu_question($response['message']['question_id']);
            if($question['message']['answerer']!=session('uid')){
                return redirect('tutor/dashboard');   
            }
            $data['tutor']=$data['userdetails'];
             if(isset($question['message']['answerer'])){
                        $answered_user = $Crostutor->userdetails(session('uid'),session('token'),$question['message']['uid']);
                        $data['student']=$answered_user['message'];

                    }
         }

        $data['dispute_id']=$dispute_id;
     /* print_r($data['dispute']);*/
 /*    echo '<pre>';
         print_r($data['tutor']);
        echo "</pre>";*/
        return view('tutor/disputesdeatil',$data);
    }
    public function completed()
    {
        return view('tutor/completed');
    }
    public function commitquestion()
    {
        return view('tutor/commitquestion');
    }
    public function answerquestions()
    {
        return view('tutor/answerquestions');
    }

    public function ajax_load_dashboard(Request $req){
                $Crostutor = new Crostutor();
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
                if($req->get('level') && !empty($req->get('level'))){
                    $parameter['level']=$req->get('level');
                }
                if($req->get('subject') && !empty($req->get('subject'))){
                    $parameter['subject']=$req->get('subject');
                }
                $questions = $Crostutor->question_list($parameter);
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
                return view('tutor/ajax_dashboard',$data);
            

    }

    public function questiondetail($question_id)
    {   

        	
	/* ---------- check tutor complete profile start ------------*/
		
		$response = $this->userdetails();
		$Crostutor = new Crostutor();
		if($response['status'] == 403){
			return redirect(url('/logout'));
		}else if($response['status'] !=0){
			return view('error',['errorMessage'=>$response['message']]);
			
		}else if($response['status'] ==0 && $response['message']['incomplete'] == true){
			$subjects = $Crostutor->basic(3);
			$data['subjects']=[];
			if(!empty($subjects['message'])){
				$data['subjects']=$subjects['message'];
			}
			$data['message']=$response['message'];
			return view('tutor/step2',$data);
		}
		$sidebar = $this->static_web();
		$response['message']['sidebar']=$sidebar['message'];
		$response['message']['balance']=$response['message']['balance']/100;
		$data['userdetails'] = $response['message'];
		/*------- check tutor complete profile end -------*/
		
        $data['question_id'] = ($question_id);
        $question = $Crostutor->stu_question($data['question_id']);
       $data['answered_user']=[]; 
       $data['unlock']=0;
       $subject = $Crostutor->basic(4);
         $data['subjects']=[];
        if(!empty($subject['message'])){
             $data['subjects'] = $subject['message'];
            }
        if(isset($question['message']['answer']['uid'])){
            $answered_user = $Crostutor->userdetails(session('uid'),session('token'),$question['message']['answer']['uid']);
            $data['answered_user']=$answered_user['message'];
        if(session('uid')==$question['message']['answer']['uid']){
                 $data['unlock']=1;
        }
        }
         $data['unlock_for_answ']=0;
        if (isset($question['message']['answerer'])) {
          if($question['message']['answerer']==session('uid') && !isset($question['message']['answer']['uid'])){
            $data['unlock_for_answ']=1;
          }
        }
        

        $data['question']=$question['message'];
       // echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        $this->usermessage();
        $data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
        $data['message']=$this->usermessage;
        $data['usermessageflag'] = $this->usermessageflag;



        return view('tutor/commitquestion',$data);
    }
    
    
    public function commit(Request $req){
       if($req->get('temp')!="" && $req->get('temp')){
                $Crostutor = new Crostutor();
                $parameter = array( 
                            'uid'        => session('uid'),
                            'qid'        => $req->get('temp'),
                            'token'      => session('token'),
                            'action'     => $req->get('role'),
                             );
                $response = $Crostutor->commit($parameter);
                return response()->json($response);  
            }
            else{
                return response()->json(['status'=>"123",'message'=>"server error"]);
            }
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
                'school_name'           => 'required'
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

public function tutor_profile_update(Request $req){
           $Crostutor = new Crostutor();
           $validator = Validator::make($req->all(), [
                'first_name'           => 'required',
                'last_name'           => 'required',
                'birthday'           => 'required',
                'phone'              => 'required',
                'subjects'         => 'required',
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
	
	public function tutor_step_profile(Request $req){
		$Crostutor = new Crostutor();
		
		$response = $Crostutor->profile_update(session('uid'),session('token'),$req);
		
		return response()->json($response);
	} 
	public function update_step_profs(Request $req){
		$parameter=array('uid'=>session('uid'),'token'=>session('token'));
		$Crostutor = new Crostutor();
		$parameter['id_photo'] = $req->get('photo_input');
		$parameter['degree'] = $req->get('deg_input');
		$parameter['teaching_credentials'] = $req->get('tc_input');
		$parameter['relevant_credentials'] = $req->get('rc_input');
			
		$response = $Crostutor->update_profs($parameter);
		
		return response()->json($response);
	}



public function update_profs(Request $req){
           $Crostutor = new Crostutor();
           if($req->get('pk_token')=="opoof1f"){
               $validator = Validator::make($req->all(), [
                    'id_photo'              => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
                    'degree'                => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
                    'teaching_credentials'  => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
                    'relevant_credentials'  => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
                ]);
             }
             else{
                $validator = Validator::make($req->all(), [
                    'id_photo'              => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
                    'degree'                => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
                    'teaching_credentials'  => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
                    'relevant_credentials'  => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
                ]);
             }
            if($validator->fails()){
                Toastr::error('Details updated Unsuccessfully', 'Error', ['options']);
                return redirect()->back()->withErrors($validator);
                 }
                 else{
                    $parameter=array('uid'=>session('uid'),'token'=>session('token'));
                    $attachements=$req->file();       
                    foreach ($attachements as $key => $attachement) {
                            $attachement_path = $attachement->getPathname();
                            $attachement_mime = $attachement->getmimeType();
                            $attachement_org  = $attachement->getClientOriginalName();
                           
                            $path = $Crostutor->upload_file(session('uid'),session('token'),$attachement_path,$attachement_mime,$attachement_org);
                            //echo $path['message'].'<br>';
                            if($path['status']==0){
                                $parameter[$key]=$path['message'];
                            }else{
                                Toastr::error('file: '.$attachement_org.' not uploaded', 'Error', ['options']);
                                Toastr::info('reson: '.$path['message'], 'Info', ['options']);
                            }
                        }
/*                        echo '<pre>';
                        print_r($parameter);
                        echo '</pre>';*/
                      $response = $Crostutor->update_profs($parameter);
                            if($response['status']==0){
                                Toastr::success('Details updated successfully.', 'Success', ['options']);
                            }else{
                                Toastr::error('Error:'.$response['message'], 'Error', ['options']);
                            }  
                 }
            return redirect()->back();
    }

    public function withdraw(Request $req){
       $validator = Validator::make($req->all(), [
                'withdraw_amt'    => 'required|min:1',
                'email'           => 'required',
            ]);
            if($validator->fails()){
                Toastr::error('Email ID and Amount are Required.', 'Error', ['options']);
                return redirect()->back()->withErrors($validator);
                 }
                 else{

                $Crostutor = new Crostutor();
                $parameter = array( 
                            'uid'        => session('uid'),
                            'token'      => session('token'),
                            'amount'     => $req->get('withdraw_amt')*100,
                            'account'      => $req->get('email'),
                             );
                $response = $Crostutor->withdraw($parameter);
                if($response['status']==0){
                                $exitCode = Artisan::call('view:clear');
                                Toastr::success('Requested successfully.', 'Success', ['options']);
                            }else{
                                Toastr::error('Error:'.$response['message'], 'Error', ['options']);
                            }  
                 }
                 return redirect()->back();
            }
            

    public function search(Request $req){
                   	
	/* ---------- check tutor complete profile start ------------*/
		
		$response = $this->userdetails();
		$Crostutor = new Crostutor();
		if($response['status'] == 403){
			return redirect(url('/logout'));
		}else if($response['status'] !=0){
			return view('error',['errorMessage'=>$response['message']]);
			
		}else if($response['status'] ==0 && $response['message']['incomplete'] == true){
			$subjects = $Crostutor->basic(3);
			$data['subjects']=[];
			if(!empty($subjects['message'])){
				$data['subjects']=$subjects['message'];
			}
			$data['message']=$response['message'];
			return view('tutor/step2',$data);
		}
		$sidebar = $this->static_web();
		$response['message']['sidebar']=$sidebar['message'];
		$response['message']['balance']=$response['message']['balance']/100;
		$data['userdetails'] = $response['message'];
		/*------- check tutor complete profile end -------*/
		
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
                        $parameter['last_id']=$req->get('temp');
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
                    
                  
                    //die;
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
                      $subject = $Crostutor->basic(4);
                     $data['subjects']=[];
                    if(!empty($subject['message'])){
                         $data['subjects'] = $subject['message'];
                        }  
                    $this->usermessage();
                    $data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
                    $data['message']=$this->usermessage;
                    $data['usermessageflag'] = $this->usermessageflag;
                    return view('tutor/search',$data);
                

        }
      
    public function send_comment(Request $req)
    {
       $Crostutor = new Crostutor();
            $parameter = array(
        'message'=>$_POST['message'],
        'questionId'=>$_POST['question'],
        'email'=>$_POST['student_email'],
        'name'=>$_POST['student_name'],
        'flag'=>$_POST['flag']    
        );
        
        $response = $Crostutor->reset_password($parameter);
        
    }

      public function answerquestion_submit(Request $req){
           $Crostutor = new Crostutor();
           $validator = Validator::make($req->all(), [
                'content'       => 'required',
            ]);
            if($validator->fails()){

                return response()->json(['status'=>101,'message'=>'File format not Support']); 
                 }
                 else{
            
                $parameter = array(
                                    'uid'           =>session('uid'),
                                    'token'         =>session('token'),
                                    'content'       =>$req->get('content'),
                                    'files'          =>$req->get('files'),
                                    'images'        =>$req->get('images'),
                                    'qid'           =>$req->get('qi'),
                                    'email'=>$req->get('studentemail'),
                                    'name'=>$req->get('studentname'),
                                    'flag'=>$req->get('flag'),
                                    'questionId'=>$req->get('questionId')
                                     );
                      
                      
                         $response = $Crostutor->answerquestion_submit($parameter);

                         return response()->json($response); 
                                
                           } 
                 }
    public function my(Request $req){
        	
	/* ---------- check tutor complete profile start ------------*/
		
		$response = $this->userdetails();
		$Crostutor = new Crostutor();
		if($response['status'] == 403){
			return redirect(url('/logout'));
		}else if($response['status'] !=0){
			return view('error',['errorMessage'=>$response['message']]);
			
		}else if($response['status'] ==0 && $response['message']['incomplete'] == true){
			$subjects = $Crostutor->basic(3);
			$data['subjects']=[];
			if(!empty($subjects['message'])){
				$data['subjects']=$subjects['message'];
			}
			$data['message']=$response['message'];
			return view('tutor/step2',$data);
		}
		$sidebar = $this->static_web();
		$response['message']['sidebar']=$sidebar['message'];
		$response['message']['balance']=$response['message']['balance']/100;
		$data['userdetails'] = $response['message'];
		/*------- check tutor complete profile end -------*/
		
        $questions = $Crostutor->my_question(session('uid'),session('token'),1,$req->get('req'),0);
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
        $subject = $Crostutor->basic(4);
         $data['subjects']=[];
        if(!empty($subject['message'])){
             $data['subjects'] = $subject['message'];
            }
        $data['req']=$req->get('req'); 
        $this->usermessage();
        $data['message']=$this->usermessage;
        $data['usermessageflag'] = $this->usermessageflag;
        $data['status'] = array('Not paid','Paid','Answering','Wait to release','Finished');
        return view('tutor/my',$data);
    }

        public function ajax_load_my(Request $req){
        if($req->get('temp')!="" && $req->get('temp')){
                $Crostutor = new Crostutor();
                $questions = $Crostutor->my_question(session('uid'),session('token'),1,$req->get('req'),$req->get('temp'));
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
                return view('tutor/ajax_dashboard',$data);
            }

    }

    public function reply_submit(Request $req){

              $Crostutor = new Crostutor();
           $validator = Validator::make($req->all(), [
                'content'       => 'required',
            ]);

            if($validator->fails()){
                Toastr::error('Error occure while submitting dispute', 'Error', ['options']);
                return redirect()->back()->withErrors($validator);
                 }else{
                    $parameter=array('uid'=>session('uid'),'content'=>$req->get('content'),'token'=>session('token'),'id'=>($req->get('temp')));

                    $parameter['files']=$req->get('files');
                    $response = $Crostutor->replay_question($parameter);
/*                    print_r($response);
                    die;*/
                    if($response['status']==0){
                        Toastr::success('Successfully Requested a dispute.', 'Success', ['options']);
                        return redirect()->back();
                    }else{
                        Toastr::error('Error:'.$response['message'], 'Error', ['options']);
                        return redirect()->back();
                    }       
                 }

    }
    }

