<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function getPresent(){
        $ids = User::select('id')->where('present', true)->get()->toArray();
        $list = [];
        foreach ($ids as $v){
            $list[] = $v['id'];
        }
        return $this->_encode($list);
    }

    /**
     * This marks people are present or not present on the day
     * @param Request $r
     */
    public function setPresent(Request $r){
        $usersId = $r->toArray();

        // people that are not on this list should be not marked as present
        // because we just probably removed their tick
        DB::table('users')
            ->whereNotIn('id', $usersId)
            ->where('present', 1)
            ->update(['present' => 0]);

        // mark these people as present
        DB::table('users')
            ->whereIn('id', $usersId)
            ->update(['present' => 1]);

        $rsp = new Response();
        $rsp->content('ok');
        $rsp->setStatusCode(200);
        $rsp->send();
    }

}