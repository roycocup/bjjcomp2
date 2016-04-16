<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\MessageBag;
use App\Models\User;

class BracketsController extends BaseController
{
    
    private $data = []; 
    private $messages;

    public function __construct(){
        $this->messages = new MessageBag();
    }

    public function index(){
        $user = new User();
        $data = $user->getAllFightersData();

        return view('brackets')->with('data', $data);
    }

}
