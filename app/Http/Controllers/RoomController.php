<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\facades\Response;
use Illuminate\Support\facades\Input;
use DB;
use Cache;

class RoomController extends Controller
{
    public function room()
	{
		$name=Input::post('name');
	    $num=Input::post('num');
		if(Cache::has($num))
		{
			$room=Cache::get($num);
		}
	    else
		{
			$ob=DB::table('room')->where('num',$num)->where('name',$name)->first();
			if($ob)
			{
				$room=$ob->room;
				//dd($room);
				Cache::put($num,$room,4320);
			}
			else
			{
				$room=null;
			}
		}
		//dd($room);
		if($room)
		{
			$json=cache()->remember($room,4320,function() use($room){
				$names=DB::table('room')->select('name')->where('room',$room)->get();
				$count=0;
				foreach($names as $oa)
				{
					$name[$count]=$oa->name;
					$count++;
				}
				return $name;
			});
			//dd($json);
			if($json)
			{
				$dan["status"]=1;
			}
			else
			{
				$dan["status"]=0;
			}
			$dan["roommate"]=$json;
			$find=DB::table('board')->select('name','date','content')->where('room',$room)->get()->toArray();
			$count=0;
			$comment=Array(Array());
			foreach($find as $ob)
			{
				$comment[$count]["name"]=$ob->name;
				$comment[$count]["date"]=$ob->date;
				$comment[$count]["content"]=$ob->content;
                $count++;
			}
			$dan["comment"]=$comment;
			//dd($dan);
			return response()->json($dan);
		}
		else
		{
			$dan["status"]=0;
			//dd($dan);
			return response()->json($dan);
		}
	}
	public function word()
	{
		$name=Input::post('name');
	    $num=Input::post('num');
		$content=Input::post('content');
		$ob=DB::table('room')->where('num',$num)->first();
		$status=DB::table('board')->insert(['name'=>$name,'room'=>$ob,'content'=>$content]);
		$dan['status']=$status;
		return response()->json($dan);
	}
}
