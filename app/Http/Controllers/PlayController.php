<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayController extends Controller
{
    public function token()
	{
		$token=csrf_token();
		return response($token);
	}
}
