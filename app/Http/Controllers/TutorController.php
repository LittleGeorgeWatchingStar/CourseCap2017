<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Library\Crostutor;
use Illuminate\Http\Request;
use Toastr;
class TutorController extends Controller
{
   
    public function becomeTutor()
    {
        $role = session('role');
    	if( $role == '0' ){
       		return redirect(url('student/dashboard'));
	    }else if(session('role') === 1){
	        return redirect(url('tutor/dashboard'));
	    }
        return view('tutorSignUp');
    }

    public function logout(Request $req)
    {
    	$Crostutor = new Crostutor();
        $response = $Crostutor->logout(session('uid'),session('password'));
        $req->session()->flush();
        return redirect('/');
    }

 

}
