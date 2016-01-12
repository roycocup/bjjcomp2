<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\API\Twitter\TwitterAPI;

class RestController extends BaseController
{
	
	public function getTwitter()
	{
		// return json_encode("hello from twitter");
		$this->testTwitter();
	}


	public function test2(){
		// Create curl resource 
		$ch = curl_init(); 
		// Set url 
		curl_setopt($ch, CURLOPT_URL, "http://twitter.com/statuses/user_timeline/lff4ever.json?count=10"); 
		// Return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		// $output contains the output string 
		$output = curl_exec($ch); 
		// Close curl resource to free up system resources 
		curl_close($ch);

		if ($output) 
		{
		    $tweets = json_decode($output,true);

		    foreach ($tweets as $tweet)
		    {
		        json_encode($tweet);
		    }
		}
	}


	public function testTwitter(){
		
		$twitter = new tmhOAuth();
	}


}

