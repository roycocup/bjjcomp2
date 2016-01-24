<?php
namespace App\Http\Controllers; 

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User; 
use Log;
use Braintree_Configuration;
use Braintree_ClientToken;
use Braintree_Transaction;

class RegisterController extends BaseController {

	private $userData = array();
	private $userToken = null;
	
	public function showRegister()
	{
		Braintree_Configuration::environment('sandbox');
		Braintree_Configuration::merchantId('mhmz7d5qhkkrtxzb');
		Braintree_Configuration::publicKey('vv339y9bx7q7mq2d');
		Braintree_Configuration::privateKey('0222b4e4fb050299206253fa3058e366');
		$clientToken = Braintree_ClientToken::generate();

		if ($_POST) {
			//second step
			$this->userData = $_POST;
			$this->userToken = $clientToken;
			return view('payment')
				->with("userData", $this->userData)
				->with("userToken", $this->userToken);
		} else {
			return view('register');	
		}
		
	}


	public function paymentConfirm(){
		Braintree_Configuration::environment('sandbox');
		Braintree_Configuration::merchantId('mhmz7d5qhkkrtxzb');
		Braintree_Configuration::publicKey('vv339y9bx7q7mq2d');
		Braintree_Configuration::privateKey('0222b4e4fb050299206253fa3058e366');
		Log::info("Payment coming in: " . json_encode($_REQUEST));
		if ($_POST["payment_method_nonce"]){
			$nonce = $_POST["payment_method_nonce"];
			$result = Braintree_Transaction::sale([
				'amount' => '20.00',
				'paymentMethodNonce' => $nonce
			]);
			echo "<pre>";
			var_dump($result);
			$details = [ 
				$result->transaction->paypal["payerEmail"] => [
					"id" 		=> $result->transaction->id,
					"status" 	=> $result->transaction->status,
					"amount" 	=> $result->transaction->amount,
					"currency" 	=> $result->transaction->currencyIsoCode,
					"date" 		=> $result->transaction->createdAt->date,
					"paymentId" => $result->transaction->paypal["paymentId"],
					"payerId" 	=> $result->transaction->paypal["payerId"],
					"payerFirstName" 	=> $result->transaction->paypal["payerFirstName"],
					"payerLastName" 	=> $result->transaction->paypal["payerLastName"],
					]
				];
			Log::info(json_encode($details));
			Log::info(serialize($result));
		}


		//return redirect("/thankyou");
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
					'date of birth' => 'required',
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
				$data['errors']['messages'] = $messages;
				return view('register')->with('data', $data);
			}

			//create a random one
			if (empty($_POST['email']))
				$email = substr(md5(@$_POST['f_name'].@$_POST['l_name'].@$_POST['dob'].@$_POST['belt']), 15)."@bjjcomp.club";
			else
				$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


			$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
			$dob = str_ireplace('/', '-', $dob);
			$dob = date('Y-m-d', strtotime($dob));

			if (strtotime($dob) > strtotime('15 years ago')){
				$messages->add('too young', 'Your date of birth is '.$dob.'. Are you sure you are less than 15 years old ? ');
				$data['errors']['messages'] = $messages;
				return view('register')->with('data', $data);
			}


			//insert
			$user = new User;
			$user->email 		= $email;
			$user->nickname 	= ($_POST['nickname'])? filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_EMAIL): '';
			$user->f_name 		= filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
			$user->l_name 		= filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
			$user->dob 			= $dob;
			$user->belt 		= filter_input(INPUT_POST, 'belt', FILTER_SANITIZE_STRING);
			$user->weight 		= $weight;
			$user->gender 		= filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
			$user->t_shirt_size = filter_input(INPUT_POST, 't_shirt_size', FILTER_SANITIZE_STRING);


			try {
				$user->save();
			}  catch(Exception $e) {
				if (stripos($e->getMessage(), 'users_email_unique') != false){
					$messages->add('100', 'Email or user already exists. Are you sure you didn\'t register already?');
					$data['errors']['messages'] = $messages;
					return view('register')->with('data', $data);
				}
			}
			
			//send email confirmation
			$data['success']['messages'] = $messages->add('101', 'Successfully Submited!');
			$body = "You have successfully registered for LFF BJJ Cup 3<br>";
			$body .= "Name: {$user->f_name} {$user->l_name}<br>";
			$body .= "Belt: {$user->belt}<br>";
			$body .= "Weight: {$user->weight}<br>";
			$body .= "<br>Good luck!<br>";
			mail($user->email, 'LFF BJJ Competition Confirmation', $body); 
		}
		return view('home')->with('data', $data);
	}

}
