<?php

namespace App\Http\Controllers\Api;

use File;
use App\User;
use DateTime;
use Socialite;
use App\Patient;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiBaseController;

class LoginController extends ApiBaseController
{

	public function socialLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'provider' => 'required',
        ]);

        $message = "Something Wrong";

        $status = "422";

        if ($validator->fails()) {          

            return $this->sendFailResponse($message,$status);
        }

        if($request->provider=="facebook"){

        	return $this->facebookLogin($request);

        }else if($request->provider=="google"){

        	return $this->googleLogin($request);
        }
    }

    private function facebookLogin(Request $request){

    	$token = $request->token;

    	try {

        	$fb_login_user = Socialite::driver('facebook')->userFromToken($token);

            $fileContents = file_get_contents($fb_login_user->getAvatar());

   		} catch (\Exception $e) {
        	
        	$message = "Login information is incorrect";

    		$status = "401";

    		return $this->sendFailResponse($message,$status);

    	}

    	if (isset($fb_login_user)) {
    		
    		return $this->findOrStore($fb_login_user, $fileContents);    	

    	}else{

    		$message = "Login information is incorrect";

    		$status = "401";

    		return $this->sendFailResponse($message,$status);

    	}    	
    }

    private function googleLogin(Request $request){


        $message = "Google Login Coming Soon!";

        $status = "422";

        return $this->sendFailResponse($message,$status);
    }

    public function findOrStore($fb_login_user, $fileContents){

    	$email = $fb_login_user->email;

    	if (is_null($email)) {
    		
    		$message = "Can't Find user's resource";

    		$status = "422";

    		return $this->sendFailResponse($message,$status);

    	}else{

    		$site_user = User::where('email', $fb_login_user->email)->first();

            $now = $now = new DateTime('Asia/Yangon');

            $today = $now->format('Y-m-d H:i:s');

    		if (empty($site_user)) {
    			
    			$site_user = User::create([
                    'name' => $fb_login_user->name,
                    'email' => $fb_login_user->email,
                    'email_verified_at' => $today,
                ]);

                $site_user->assignRole(3);

                $image =  time()."-".$site_user->id;                

                File::put(public_path() . '/image/PatientProfile/' . $image . ".jpg", $fileContents);
                
                $patient = Patient::create([
                    'name' => $site_user->name,
                    'photo' => $image,
                    'status' => 0,
                    'user_id' => $site_user->id,
                ]);

                $patient_code =  "BHS-PTT" . sprintf("%05s", $patient->id);

                $patient->patient_code = $patient_code;

                $patient->save();

                $tokenResult = $site_user->createToken('Laravel Personal Access Client')->accessToken;

        		return $this->sendSuccessResponse('access_token', $tokenResult);
    		}
    		else{

    			$tokenResult = $site_user->createToken('Laravel Personal Access Client')->accessToken;

    			return $this->sendSuccessResponse('access_token', $tokenResult);
    		}
    	}
    }


    public function normalLogin(Request $request){

    	$validator = Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required',
		]);

		$message = "Something Wrong";

    	$status = "422";

		if ($validator->fails()) {	
		    return $validator->errors();
		}

		$password = $request->password;
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $user = User::where('email', $request->email)->first();
        }
        elseif(is_numeric($request->email)){
            $user = User::where('phone', $request->email)->first();
        }

		if (empty($user)) {

			return $this->sendFailResponse($message,$status);
		}
		elseif (!\Hash::check($password, $user->password)) {
			return $this->sendFailResponse($message,$status);

		}else{

            $tokenResult = $user->createToken('Laravel Personal Access Client')->accessToken;
            
            $userid=$user->id;

            return response()->json([
                "message" => "Successful",
                "status" => 200,
                "access_token" => $tokenResult,
                "user_id"=> $userid,
            ]);
			// return $this->sendSuccessNormalLoginResponse('access_token', $tokenResult,$userid);

		}
    }

    public function register(Request $request){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|unique:users,phone',
                'password' => 'required|min:8',
                'address' => 'required',
            ]);
            if ($validator->fails()) {			

                return $validator->errors();
                //return $this->sendFailResponse($message,$status);
            }
            $patient_user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => \Hash::make($request->password),
            ]);
    

		$message = "Something Wrong";

    	$status = "422";

	

        $image_name = "user.jpg";

       
        $patient_user->assignRole(3);

        /*$verifyUser = VerifyUser::create([
            'user_id' => $patient_user->id,
            'token' => sha1(time())           
        ]);
        
        \Mail::to($patient_user->email)->send(new VerifyMail($patient_user));*/

        $patient = Patient::create([
            'name' => $request->name,
            'age' => $request->age == null? "":$request->age,
            'photo' => $image_name,
            'status' => 0,
            'address' => $request->address,
            'phone' => $request->phone == null? "":$request->phone,
            'user_id' => $patient_user->id,
        ]);

        $patient_code =  "BHS-PTT" . sprintf("%05s", $patient->id);

        $patient->patient_code = $patient_code;

        $patient->save();

        $tokenResult = $patient_user->createToken('Laravel Personal Access Client')->accessToken;

        return $this->sendSuccessResponse('access_token', $tokenResult);
    }

    public function logout(Request $request){

    	$request->user()->token()->revoke();

    	return response()->json("Success");
    }
    
    
}
