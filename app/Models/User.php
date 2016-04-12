<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper;

class User extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    public $age_categories = array(
            // 'child' => array(1, 16),
            'adult' => array (0, 100),
            // 'master1' => array (30, 35),
            // 'master2' => array (36, 40),
            // 'master3' => array (41, 46),
            // 'master4' => array (47, 100),
        );

    public $belt_colours = array('white','blue','purple','brown','black');
    public $belt_colours_kids = array('white','grey','yellow','orange');


    public function getFightersFor($gender, $age_group, $belt, $weight){
        $min_age = $this->age_categories[$age_group][0];
        $max_age = $this->age_categories[$age_group][1];
        $min_birthday = Helper::calculateBirthday($min_age);
        $max_birthday = Helper::calculateBirthday($max_age);

        $results =  User::whereRaw( 'gender = ? AND belt = ? AND weight = ? AND dob BETWEEN ? AND ? '
            , array($gender, $belt, $weight, $max_birthday, $min_birthday) )
        ->orderBy('dob')->get();

        // $queries = DB::getQueryLog();
        // $last_query = end($queries);

        // var_dump($results->all(), $last_query, $age_group);
        return $results;
    }

    

}
