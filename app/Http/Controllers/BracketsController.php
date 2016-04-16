<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\MessageBag;

class BracketsController extends BaseController
{
    
    private $data = []; 
    private $messages;

    public function __construct(){        
        $this->messages = new MessageBag();
    }

    public function index(){
        return view('index');
    }

}
