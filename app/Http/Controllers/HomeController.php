<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\MessageBag;
use Monolog\Logger;
use Log; 

class HomeController extends BaseController
{
    
    private $data = []; 
    private $messages;

    public function __construct(){
    	$this->messages = new MessageBag();
    }

	public function showHome(){
		return view('home')->with('data', $this->data);
	}



	public function getDownload(){
		$file= public_path(). "/img/LFF_BJJ_CUP.ics";
		$headers = array(
			  'Content-Type: text/calendar',
			);
		return Response::download($file, 'lff_bjj_cup.ics', $headers);
	}

	public function thankyou(){
        if (!empty($_GET))
        {
            Log::info("Recording the thank you data. ". json_encode($_GET));
        }
		$this->messages->add("thank you", "Thank you. Your registration is complete. <br> A payment confirmation should be emailed to you by Paypal.");
		$this->data['success']['messages'] = $this->messages;
		return view('home')->with('data', $this->data);
	}

}
