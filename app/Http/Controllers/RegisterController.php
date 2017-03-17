<?php
namespace App\Http\Controllers; 

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User; 
use App\Models\TempUser;
use Log;
use Braintree_Configuration;
use Braintree_ClientToken;
use Braintree_Transaction;
use Monolog\Logger;
use Validator;
use App\PaypalIPN\PaypalIPN;

class RegisterController extends BaseController {

	private $userData = array();
	private $userToken = null;
	private $tempUser = null;
	
	public function showRegister()
	{

		if ($_POST) {
			Log::info("Attempted Registration with: ", $_POST);
			$messages = $this->register();

			if ($messages->any()) {
				return view('register')->with("messages", $messages);	
			} else {
				$this->userData = $_POST;
				$this->tempUser->userToken = $this->makeUserToken($this->tempUser->email.time());
				$this->tempUser->save();
				return view('payment')
					->with("userData", $this->userData)
					->with("userToken", $this->tempUser->userToken);
			}
		} 

		return view('register');	
	}


	private function makeUserToken($str){
		return substr(md5($str), 0, 10);
	}


	public function paymentConfirm(){
		
		if (!empty($_REQUEST["token"])){
            $userToken = $_REQUEST["token"];
            // this was set in the button as return url and seems to just come in non stop in repeat mode....
            if ($userToken == "xxxxx")
            {
                $this->ipn();
                die;
            }

            Log::info("Payment coming in: " . json_encode($_REQUEST));
			$tempUser = TempUser::where("usertoken", $userToken)->first();
			if (!$tempUser){
				Log::critical("User token: ".$_REQUEST["token"]." Unable to find user after paypal. Please check paypal for emails and confirm all his form.");
			}else{
                $tempUser->payment_date = (new \Datetime())->format('Y-m-d H:i:s');
				$tempUser->status = "Paid";
				$tempUser->save();

				$user = $this->createNewUser($tempUser);

                $this->sendEmail($user);
			}
		}
        
		return redirect("/thankyou");
	}


	private function createNewUser($old_user){
		if($user = User::where("email", $old_user->email)->first()){
			Log::error("Creating new user for ".$old_user->email." when its already in the User table");
			return $user;
		}
		$user = new User();
		$user->email        = $old_user->email;
		$user->nickname     = $old_user->nickname;
		$user->f_name       = $old_user->f_name;
		$user->l_name       = $old_user->l_name;
		$user->dob          = $old_user->dob;
		$user->belt         = $old_user->belt;
		$user->weight       = $old_user->weight;
		$user->gender       = $old_user->gender;
		$user->t_shirt_size = $old_user->t_shirt_size;
		$user->usertoken    = $old_user->usertoken;
		$user->payment_date = date_create()->format("Y/m/d H:i:s");
		$user->status       = $old_user->status;
		$user->save();
		return $user; 
	}


	private function register(){
		
		$data = array();
		$messages = new MessageBag();

		if ($_POST) {
			
			if (isset($_POST['gender']) && $_POST['gender'] == 'male' ){
				$weight = @$_POST['men-weight'];
			}

			if (isset($_POST['gender']) && $_POST['gender'] == 'female' ){
				$weight = @$_POST['women-weight'];
			}

			$validator = Validator::make(
				array(
					'email' 		=> $_POST['email'],
					'first name' 	=> $_POST['f_name'],
					'last name' 	=> $_POST['l_name'],
					'date of birth' => $_POST['dob'],
					'gender' 		=> $_POST['gender'],
					'belt' 			=> $_POST['belt'],
					'weight' 		=> $weight,
				),
				array(
					'email' 		=> 'email',
					'first name' 	=> 'required',
					'last name' 	=> 'required',
					'date of birth' => 'required|date_format:Y/m/d',
					'gender' 		=> 'required',
					'belt' 			=> 'required',
					'weight' 		=> 'required',
				)
			);

			
			//validate
			if ($validator->fails()){
				//check email is not used already
				//not done yet
				$messages = $validator->messages();
				return $messages;
			}


			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
			$dob = str_ireplace('/', '-', $dob);
            $dob = new \DateTime($dob);
            //$dob = date('Y-m-d', strtotime($dob));

			if (strtotime($dob->format('d-m-Y')) > strtotime('15 years ago')){
				$messages->add('too young', 'Your date of birth is '.$dob->format('d-m-Y').'. Are you sure you less than 15 years old? ');
				return $messages;
			}


			if ( User::where("email", $email)->first() ){
				$messages->add('email exists', "This email has already registered");
				return $messages;
			}


			//insert
			$this->tempUser = new TempUser;
			$this->tempUser->email 		= $email;
			$this->tempUser->nickname 	= ($_POST['nickname'])? filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_EMAIL): '';
			$this->tempUser->f_name 	= filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
			$this->tempUser->l_name 	= filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
			$this->tempUser->dob 		= $dob->format('Y-m-d');
			$this->tempUser->belt 		= filter_input(INPUT_POST, 'belt', FILTER_SANITIZE_STRING);
			$this->tempUser->weight 	= $weight;
			$this->tempUser->gender 	= filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
			$this->tempUser->t_shirt_size = filter_input(INPUT_POST, 't_shirt_size', FILTER_SANITIZE_STRING);
			$this->tempUser->status     = "Unpaid";


			try {
				$this->tempUser->save();
				return $messages;
			}  catch(Exception $e) {
				if (stripos($e->getMessage(), 'users_email_unique') != false){
					$messages->add('100', 'Email or user already exists. Are you sure you didn\'t register already?');
					return $messages;
				}
			}
			
		}	
	}


	public function sendEmail($user){
		 //send email confirmation
		$body = "You have successfully registered for LFF BJJ Cup 3<br>";
		$body .= "Name: {$user->f_name} {$user->l_name}<br>";
		$body .= "Belt: {$user->belt}<br>";
		$body .= "Weight: {$user->weight}<br>";
		$body .= "<br>Good luck!<br>";
		mail($user->email, 'LFF BJJ Competition Confirmation', $body); 
	}


	public function ipn()
    {
        $ipn = new PaypalIPN();

        $verified = $ipn->verifyIPN();
        if ($verified) {

            $email = $_POST["payer_email"];
            $name = $_POST["first_name"]." ".$_POST["last_name"];
            Log::info("IPN from Paypal: ",
                [
                    'email' => $email,
                    'name' => $name,
                    'payer_id' => $_POST["payer_id"],
                ]
            );

            // has paid already in any of the matches?
            if (TempUser::where("email", $email)->where('status', 'Paid')->count())
            {
                Log("$name has already paid it seems");
                die;
            }


            $tempUser = TempUser::where("email", $email)
                ->orderBy('created_at', 'desc')
                ->first();

            if (!$tempUser)
            {
                Log::info("Unable to find email ". $email . " for ". $name. ". Not registering. Please check manually.");
                die;
            }

            if ($tempUser->status != "Paid")
            {
                Log::info("IPN is validating payment for: ".$name." - ".$email);

                $tempUser->payment_date = (new \Datetime())->format('Y-m-d H:i:s');
                $tempUser->status = "Paid";
                $tempUser->save();

                $user = $this->createNewUser($tempUser);

                //$this->sendEmail($user);
            }


        }
    }

}
