<?php 

namespace App; 

class Helper {

	static function eventData ($name) {
		$eventData = [
			'startDate' 		=> date_create("2017-05-14"),
			'title' 			=> "LFF BJJ Cup IV",
			'alterTitle' 		=> "LFF BJJ Competition IV",
			'registerCutoff' 	=> date_create("2017-05-12 00:00:00"),
			'promoUntil' 		=> date_create("2017-04-16"),
		];
		return $eventData[$name];
	}

	static function getWeightStr($str, $gender){

		if ($gender == 'male'){
			$men_weights = Helper::getMenWeights();
			return $men_weights[$str];
		} else {
			$women_weights = Helper::getWomenWeights();
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


	static function mapRegistrationFieldNames($fieldName){
		$map = array(
			"nickname" 		=> "nickname",
			"email" 		=> "Email",
			"f_name" 		=> "First Name", 
			"l_name" 		=> "Last Name",
			"dob" 			=> "Date of Birth",
			"gender" 		=> "Gender",
			"belt" 			=> "Belt",
			"men-weight" 	=> "Weight",
			"women-weight" 	=> "Weight",
			"t_shirt_size" 	=> "T-shirt Size",
		); 

		if (array_key_exists($fieldName, $map))
			return $map[$fieldName];
		else
			return $fieldName;
	}

}

 