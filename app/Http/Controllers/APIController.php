<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Response;

class APIController extends BaseController
{

    private function _encode($msg){
        return json_encode($msg);
    }

    private function _decode($msg){
        return json_decode($msg);
    }

    public function index(){
        return view('apilist');
    }

    public function getList(){
        $user = new User();
        $all = $user->orderBy('f_name', 'asc')->get()->toArray();

        $r = Response::create($this->_encode($all));

        $r->send();

    }

}