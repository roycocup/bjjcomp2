<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\API\Twitter\TwitterAPI;

class RestController extends BaseController
{
    
    public function getTwitter()
    {
        return json_encode("hello from twitter");
    }


}

