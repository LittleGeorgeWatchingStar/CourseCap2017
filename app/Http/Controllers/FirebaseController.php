<?php
	
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;

use App\Library\Crostutor;

class FirebaseController extends Controller

{
	private $database;
	public function __construct(){
		$serviceAccount = ServiceAccount::fromJsonFile(public_path('google-services.json'));		
		$firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://crosservice-2dc5b.firebaseio.com')->create();
		$this->database = $firebase->getDatabase();
	}
	
	public function index(){
	
		//try{
		
			$messages = $this->database->getReference('chat/messages/qst5b6534e62a7b3');
			
			//$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
			
			//$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
			
			//$newPost->getChild('title')->set('Changed post title');
			
			//$newPost->getValue(); // Fetches the data from the realtime database
			
			//$newPost->remove();
			
			
			
			
		//}catch(Exception $e){
			
		//}
		
	}
	public function getchat(Request $request)
    {   
        $question = $request->get('question');
		$question_id = ($question);   
		try{
		
			$messages = $this->database->getReference('chat/messages/'.$question_id);			
			$data['result'] = $messages->getvalue();
			return view('student/chat',$data);			
			
		 }catch(Exception $e){
			return false;
		}
		
	}
	public function send_comment(Request $request)
    {   
		$Crostutor = new Crostutor();
        $question = $request->get('question');
        $message = $request->get('message');
		$question_id = ($question);
		   
		$aa = $request->get('flag');

		if(!empty($request->get('flag')))
		{
			$parameter = array(
				'message'=>($message),
				'questionId'=>$question,
				'email'=>$request->get('student_email'),
				'name'=>$request->get('student_name'),
				'flag'=>$request->get('flag')    
				);
				$response = $Crostutor->reset_password($parameter);
		} 
        
		try{
		
			$token = $this->database->getReference('chat/messages/'.$question_id)->push([
			   'createdTimestamp' => Database::SERVER_TIMESTAMP,
			   'hideFromFirstUser' => false,
			   'hideFromSecondUser' => false,
			   'userAvatarURL' => $request->get('userAvatarURL'),
			   'textContent' => $message,
			   'uID' => session('uid')		   
			   
			  ])->getvalue();
			 
			  $token = $this->database->getReference('chat/rooms/'.$question_id)->push([
			   'hideFromuid1' => false,
			   'hideFromuid2' => false,
			   'lastMessageReadUID1' => Database::SERVER_TIMESTAMP,
			   'lastTimestampuid1' => Database::SERVER_TIMESTAMP,
			   'lastTimestampuid2' => Database::SERVER_TIMESTAMP,
			   'parentKey' => $question_id,
			   'qid' => $question_id,	   
			   'uid1' => session('uid'),	   
			   'uid2' => $request->get('uid2'),	   
			   
			  ])->getvalue();
			
			
			return $token;			
			
		 }catch(Exception $e){
			return false;
		}
		
	}
	
}

?>