<?php
namespace app\Http\Controllers; 

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class UserController extends BaseController {

	public function showBrokenList()
	{
		$user = new User();
		
		$genders = array('male', 'female');
		$age_categories = $user->age_categories;
		$belts = $user->belt_colours;
		$menWeights = getMenWeights();
		$womenWeights = getWomenWeights();

		//gender / age-group / belt / weight
		foreach ($genders as $gender){
			foreach ($belts as $belt) {
				foreach ($age_categories as $age=>$values) {
					if ($gender == 'male'){
						$weights = $menWeights;	
					}else{
						$weights = $womenWeights;
					}

					foreach($weights as $weight=>$textual){
						$data[$gender][$age][$belt][$weight] = $user->getFightersFor($gender, $age, $belt, $weight);
					}
					
				}
			}
			
		}
		
		

		$data['genders'] 		= $genders;
		$data['age_categories'] = $age_categories;
		$data['belts'] 			= $belts;
		$data['menWeights'] 	= $menWeights;
		$data['womenWeights'] 	= $womenWeights;


		
		return View::make('userbrokenlist')->with('data', $data);
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
