<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    
	public function showHome()
	{
		return view('home');
	}


	public function getDownload(){
		$file= public_path(). "/img/LFF_BJJ_CUP.ics";
		$headers = array(
			  'Content-Type: text/calendar',
			);
		return Response::download($file, 'lff_bjj_cup.ics', $headers);
	}

}
