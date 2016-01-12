<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use TwitterOAuth\Auth\SingleUserAuth;
use TwitterOAuth\Serializer\ArraySerializer;


class RestController extends BaseController
{
	
	public function getTwitter()
	{

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
		
		echo json_encode($outputArray);
	}


}

