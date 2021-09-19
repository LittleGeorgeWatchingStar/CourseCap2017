<?php 
namespace App\Library;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;

class CrosTutor 
{
   
    protected $base_url;


    public function __construct(){
        $this->base_url = config('app.apiUrl');
		$this->client = new Client(['base_uri' => $this->base_url]);
	}
	public function getdata($type){	
		 
		try {
			$r = $this->client->post('/basic/data',['form_params' => ['type'=>$type]]);
			$response = $r->getBody()->getContents();
			return json_decode($response, true);
		}
		catch (Exception $e) {
			return false;
		}
		
	}
	public function register($userdata){
		try {
			$r = $this->client->post('/user/register',['form_params' => $userdata]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}
	public function login($userdata){
		try {
			$r = $this->client->post('/user/login',['form_params' => $userdata]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}
	
	public function  is_email_available($email){
		try {
			$r = $this->client->post('/user/check_email',['form_params' => ['email'=>$email]]);
			$response = $r->getBody()->getContents();
			$response = json_decode($response, true);
			
			return $response['message']['status'] ==0 ? true : false;
			//return json_decode($response, true);
		}
		catch (Exception $e) {
			return false;
		}
		
		
	}
	public function  is_username_available($username){
		try {
			$r = $this->client->post('/user/check_username',['form_params' => ['username'=>$username]]);
			$response = $r->getBody()->getContents();
			$response = json_decode($response, true);
			
			return $response['message']['status'] ==0 ? true : false;
			//return json_decode($response, true);
		}
		catch (Exception $e) {
			return false;
		}
		
		
	}
	public function  logout($uid,$password){
		try {
			$r = $this->client->post('/user/logout',['form_params' => ['uid'=>$uid,'password'=>$password]]);
			$response = $r->getBody()->getContents();
			$response = json_decode($response, true);
			
			return $response['status'] ==0 ? true : false;
			//return json_decode($response, true);
		}
		catch (Exception $e) {
			$result = array();
			$result['message'] = $e->errorMessage();
			return $result;
		}
	}
	public function  userdetails($uid=null,$token=null,$userId=null){
		$user = ['uid'=>$uid,'token'=>$token];
		if(!empty($userId)){
			$user['user']=$userId;
		}
		try {
			$r = $this->client->post('user/detail',['form_params' => $user]);
			$response = $r->getBody()->getContents();
			return json_decode($response, true);	
		}
		catch (Exception $e) {
			$result = array('status'=>'555');
			$result['message'] = $e->errorMessage();
			return $result;
		}
	}

	public function  usermessage($uid,$token,$userId=null){
		$user = ['uid'=>$uid,'token'=>$token];
		if(!empty($userId)){
			$user['user']=$userId;
		}
		try {
			$r = $this->client->post('system/messages',['form_params' => $user]);
			$response = $r->getBody()->getContents();
			return json_decode($response, true);	
		}
		catch (Exception $e) {
			$result = array('status'=>'555');
			$result['message'] = $e->errorMessage();
			return $result;
		}
	}
	public function reset_password($userdata){
		try {
			$r = $this->client->post('/user/reset_password',['form_params' => $userdata]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}
	
	public function update_student_avatar($uid,$token,$path){
		$user = ['uid'=>$uid,'token'=>$token];
		if(!empty($path)){
			$user['avatar']=$path;
		}
		try {
			$r = $this->client->post('/user/modify',['form_params' => $user]);
			$response = $r->getBody()->getContents();
			return json_decode($response, true);	
		}
		catch (Exception $e) {
			$result = array('status'=>'555');
			$result['message'] = $e->errorMessage();
			return $result;
		}
	}

	public function upload_file($uid,$token,$attachement_path,$attachement_mime,$attachement_org){
		$user = ['uid'=>$uid,'token'=>$token];
		$form = array(
					  'multipart' => [
					  					[
								           'name'     => 'uid',
								            'contents' => $uid
								        ],
                                       [
								           	'name'     => 'token',
								            'contents' => $token
								        ],
                                        [
                                           'name'     => 'file',
                                           'filename' => $attachement_org,
                                           'Mime-Type'=> $attachement_mime,
                                           'contents' => fopen($attachement_path, 'r' ),
                                        ]
                                      ],
					 );
		try {
			$r = $this->client->post('/system/upload',$form);
			$response = $r->getBody()->getContents();
			return json_decode($response, true);	
		}
		catch (Exception $e) {
			$result = array('status'=>'555');
			$result['message'] = $e->errorMessage();
			return $result;
		}
	}

	public function change_password($uid,$token,$old_password,$new_password){
		$user = ['uid'=>$uid,'token'=>$token];
	
			$user['old_password']=$old_password;
			$user['new_password']=$new_password;
		
		try {
			$r = $this->client->post('/user/change_password',['form_params' => $user]);
			$response = $r->getBody()->getContents();
			return json_decode($response, true);	
		}
		catch (Exception $e) {
			$result = array('status'=>'555');
			$result['message'] = $e->errorMessage();
			return $result;
		}
	}

	public function  basic($type){
		if(!empty($type)){
			$user['type']=$type;
		}
		try {
			$r = $this->client->post('/basic/data',['form_params' => $user]);
			$response = $r->getBody()->getContents();
			return json_decode($response, true);	
		}
		catch (Exception $e) {
			$result = array('status'=>'555');
			$result['message'] = $e->errorMessage();
			return $result;
		}
	}

	public function profile_update($uid,$token,$req){
		$user = ['uid'=>$uid,'token'=>$token];
		if(!empty($req->get('first_name'))){
			$user['first_name']=$req->get('first_name');
		}
		if(!empty($req->get('last_name'))){
			$user['last_name']=$req->get('last_name');
		}
		if(!empty($req->get('school'))){
			$user['school_id']=$req->get('school');
		}
		if(!empty($req->get('birthday'))){
			$user['birthday']=$req->get('birthday');
		}
		if(!empty($req->get('school_name'))){
			$user['school_name']=$req->get('school_name');
		}
		if(!empty($req->get('subjects'))){
			$subject=implode(",",$req->get('subjects'));
			$user['subjects'] = $subject;
		}
		if(!empty($req->get('description'))){
			$user['description']=$req->get('description');
		}
		if(!empty($req->get('phone'))){
			$user['phone']=$req->get('phone');
		}
		if(!empty($req->get('phone'))){
			$user['phone']=$req->get('phone');
		}
		if(!empty($req->get('avatar'))){
			$user['avatar']=$req->get('avatar');
		}
		if(!empty($req->get('gender'))){
			$user['gender']=$req->get('gender');
		}
		try {
			$r = $this->client->post('/user/modify',['form_params' => $user]);
			$response = $r->getBody()->getContents();
			return json_decode($response, true);	
		}
		catch (Exception $e) {
			$result = array('status'=>'555');
			$result['message'] = $e->errorMessage();
			return $result;
		}
	}

	public function postquestion_submit($parameter){
		try {
			$r = $this->client->post('/question/post',['form_params' => $parameter]);		//Modified by vadik
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

	public function  my_question($uid,$token,$role,$type,$last_id=null){
		$user = ['uid'=>$uid,'token'=>$token,'role'=>$role,'status'=>$type,'last_id'=>$last_id];
		try {
			$r = $this->client->post('/question/my',['form_params' => $user]);
			$response = $r->getBody()->getContents();
			
			return json_decode($response, true);	
		}
		catch (Exception $e) {
			$result = array('status'=>'555');
			$result['message'] = $e->errorMessage();
			return $result;
		}
	}

	public function cost_cac($parameter){
		try {
			$r = $this->client->post('/question/calculate_cost',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

	public function add_topup($parameter){
		try {
			$r = $this->client->post('/user/topup',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

	public function  stu_question($question){

	$user = ['uid'=>session('uid'),'token'=>session('token'),'qid'=>$question,'isView'=>1];
	try {
		$r = $this->client->post('/question/detail',['form_params' => $user]);
		$response = $r->getBody()->getContents();
		
		return json_decode($response, true);	
	}
	catch (Exception $e) {
		$result = array('status'=>'555');
		$result['message'] = $e->errorMessage();
		return $result;
	}
	}
	
	public function pay_with_blance($parameter){
		try {
			$r = $this->client->post('/stripe/payWithBalance',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

		public function question_list($parameter){
			$parameter['showDefaultImage']=0;
	//	try {
			$r = $this->client->post('/question/list',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
	//	}catch (Exception $e) {
//			$result['message'] = $e->errorMessage();
//		}
		return $result;
	}
	
	public function commit($parameter){

		try {
			$r = $this->client->post('/question/commit',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}
	
	public function update_profs($parameter){

		try {
			$r = $this->client->post('/user/credential',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}

		return $result;
	}
	public function withdraw($parameter){

		try {
			$r = $this->client->post('withdraw/request',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}

		return $result;
	}
	public function complete_student($parameter){
		
		try {
		
			$r = $this->client->post('/user/modify',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
			
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}

		return $result;
	}

		public function question_list_key($parameter){
		try {
			$r = $this->client->post('/question/search',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}
	
	public function answerquestion_submit($parameter){
		try {
			$r = $this->client->post('/question/answer',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

	public function sendemail_submit($parameter){
		try {
			$r = $this->client->post('/question/sendemail',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

	public function release_question($parameter){
		try {
			$r = $this->client->post('/question/release',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}
	
	public function dispute_question($parameter){
		try {
			$r = $this->client->post('/dispute/request',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

		public function replay_question($parameter){
		try {
			$r = $this->client->post('dispute/reply',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

	public function dispute_detail($parameter){
		try {
			$r = $this->client->post('/dispute/detail',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

	
	public function fb_login($parameter){
		try {
			$r = $this->client->post('/user/facebook',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

	public function my_dispute($parameter){
		try {
			$r = $this->client->post('/dispute/listForWeb',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}	

		public function static_web($parameter){
		try {
			$r = $this->client->post('/system/infoForWeb',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

		public function share_link($parameter){
		try {
			$r = $this->client->post('basic/promotionForWeb',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
		return $result;
	}

		public function sharelink_with_email($parameter){
		try {
			$r = $this->client->post('basic/sendInvitationEmails',['form_params' => $parameter]);
			$response = $r->getBody()->getContents();
			$result = json_decode($response, true);
		}catch (Exception $e) {
			$result['message'] = $e->errorMessage();
		}
/*		echo '<pre>';
		print_r($result);
		echo '</pre>';
		die;*/
		return $result;
	}
	
}

