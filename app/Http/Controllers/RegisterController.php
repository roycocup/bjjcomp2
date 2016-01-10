<?php
namespace app\Http\Controllers; 

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller as BaseController;

class RegisterController extends BaseController {

	
	public function showRegister()
	{
		if ($_POST){
			
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

			$data = array();
			$messages = new MessageBag();

			//validate
			if ($validator->fails()){
				//check email is not used already
				//not done yet
				$messages = $validator->messages();
				$data['errors']['messages'] = $messages;
				return View::make('register')->with('data', $data);
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
				return View::make('register')->with('data', $data);
			}


			//insert
			$user = new User;
			$user->email 	= $email;
			$user->nickname = ($_POST['nickname'])? filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_EMAIL): '';
			$user->f_name 	= filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
			$user->l_name 	= filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
			$user->dob 		= $dob;
			$user->belt 	= filter_input(INPUT_POST, 'belt', FILTER_SANITIZE_STRING);
			$user->weight 	= $weight;
			$user->gender 	= filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
			$user->t_shirt_size 	= filter_input(INPUT_POST, 't_shirt_size', FILTER_SANITIZE_STRING);

			try{
				$user->save();
			} catch(Exception $e){
				if (stripos($e->getMessage(), 'users_email_unique') != false){
					$messages->add('100', 'Email or user already exists. Are you sure you didn\'t register already?');
					$data['errors']['messages'] = $messages;
					return View::make('register')->with('data', $data);
				}
			}
			
			//send email confirmation
			$data['success']['messages'] = $messages->add('101', 'Successfully Submited!');
			$body = "You have successfully registered for a competition on the 10th of May in LFF<br>";
			$body .= "Name: {$user->f_name} {$user->l_name}<br>";
			$body .= "Belt: {$user->belt}<br>";
			$body .= "Weight: {$user->weight}<br>";
			$body .= "<br>Good luck!<br>";
			mail($user->email, 'LFF BJJ Competition Confirmation', $body); 
			return View::make('register')->with('data', $data);
			//$user->id
		}
		return View::make('register');
	}


}
