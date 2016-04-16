<?php
namespace App\Http\Controllers; 

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Helper;

class UserController extends BaseController {

	public function showBrokenList()
	{
		$user = new User();
		$data = $user->getAllFightersData();
		
		return view('userbrokenlist')->with('data', $data);
	}



	public function showList()
	{
		$user = new User();

		$all = $user->orderBy('created_at')->get()->toArray();
		
		$age_categories = $user->age_categories;
		$belts = $user->belt_colours;
		$weights = $user->weights;
		
		usort($all, function($a, $b){
			$belt_order = array('white', 'blue', 'purple', 'brown', 'black');
			
			$i1 = array_search($a['belt'], $belt_order);
			$i2 = array_search($b['belt'], $belt_order);
			
			return ($i1 < $i2) ? -1 : 1;
		});		

		$data['all'] = $all;

		

		return view('userlist')->with('data', $data);
	}

}
