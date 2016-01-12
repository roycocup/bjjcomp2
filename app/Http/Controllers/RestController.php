<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use TwitterOAuth\Auth\SingleUserAuth;
use TwitterOAuth\Serializer\ArraySerializer;


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
		
		$credentials = array(
			'consumer_key' 			=> env("TWITTER_KEY"),
			'consumer_secret' 		=> env("TWITTER_SECRET"),
			'oauth_token' 			=> env("OAUTH_TOKEN"),
			'oauth_token_secret' 	=> env("OAUTH_SECRET"),
		);


		$auth = new SingleUserAuth($credentials, new ArraySerializer());

		$params = array(
			'screen_name' => 'LFF4EVER',
			'count' => 5,
			'exclude_replies' => true, 
			'include_rts' => false,
			'trim_user' => true,
		);

		$response = $auth->get('statuses/user_timeline', $params);

		// echo '<pre>'; print_r($auth->getHeaders()); echo '</pre>';

		// echo '<pre>'; print_r($response); echo '</pre><hr />';

		// echo '<pre>'; 
		// foreach($response as $r){
		// 	print $r['text']."<br>";
		// }
		// echo '</pre><hr />';

		$outputArray = [];
		$i = 0;
		foreach($response as $r){
			$outputArray[$i] = [
				'created_at'=>$r['created_at'], 
				'text'=>$r['text'],
			];
			if (!empty($r['entities']['media'][0]['media_url'])){
				$outputArray[$i] = array_merge($outputArray[$i], ['media'=>$r['entities']['media'][0]['media_url']]);
			}

			$i++;
		}
		
		// echo json_encode($outputArray);
	}


}

