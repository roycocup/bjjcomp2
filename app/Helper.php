<?php 

namespace App; 

class Helper {

	static function getWeightStr($str, $gender){

		if ($gender == 'male'){
			$men_weights = getMenWeights();
			return $men_weights[$str];
		} else {
			$women_weights = getWomenWeights();
			return $women_weights[$str];
		}

	}


	static function getMenWeights(){
		return array(
			"rooster" 		=> 'Rooster (<57.5Kg)',
			's_feather' 	=> 'Super Feather (<64Kg)',
			"feather" 		=> 'Feather (<70Kg)',
			"light" 		=> 'Light (<76Kg)',
			"middle" 		=> 'Middle (<82.3Kg)',
			"m_heavy" 		=> 'Medium Heavy (<88.3Kg)',
			"heavy" 		=> 'Heavy (<94.3Kg)',
			"s_heavy" 		=> 'Super Heavy (<100.5Kg)',
			"u_heavy" 		=> 'Ultra Heavy (>100.5Kg)',
		);
	}


	static function getWomenWeights(){
		return array(
			"s_feather" 	=> 'Super Feather (<53.5Kg)',
			"feather" 		=> 'Feather (<58.5Kg)',
			"light" 		=> 'Light (<64Kg)',
			"middle" 		=> 'Middle (<69Kg)',
			"m_heavy" 		=> 'Medium Heavy (<74Kg)',
			"heavy" 		=> 'Heavy (>74Kg)',
		);
	}

	static function calculateBirthday($age){
		$year = date('Y', time())- $age;  
		return $year.'-01-01';
	}

}

 