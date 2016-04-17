<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\MessageBag;
use App\Models\User;

class CompetitionController extends BaseController
{
    
    private $data = []; 
    private $messages;

    public function __construct(){
        $this->messages = new MessageBag();
    }

    public function getFight(){
        $request = $_POST;
        if ($request['gender'] == 'male')
            unset($request['women-weight']);
        else
            unset($request['men-weight']);

        // $results =  self::whereRaw( 'gender = ? AND belt = ? AND weight = ? AND dob BETWEEN ? AND ? '
        //     , array($gender, $belt, $weight, $max_birthday, $min_birthday) )
        // ->orderBy('dob')->get();
    }

}
