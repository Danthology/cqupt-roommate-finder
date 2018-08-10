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
		$name=request()->input('name');
	    $num=request()->input('num');
		if(Cache::has($num))
		{
			$room=Cache::get($num);
		}
	  else
		{
			$ob=DB::table('room')->where('num',$num)->where('name',$name)->first();
			if($ob)
			{
				$room[0]=$ob->room;
				$room[1]=$ob->qq;
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
			$json=cache()->remember($room[0],4320,function() use($room){
				$names=DB::table('room')->select('name')->where('room',$room[0])->get();
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
			$find=DB::table('board')->select('name','date','content')->where('room',$room[0])->get()->toArray();
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
			$dan["room"]=$room[0];
			$dan["qq"]=$room[1];
			$dan["count"]=$count;
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
		$name=request()->input('name');
	  $num=request()->input('num');
		$content=request()->input('content');
		$ob=DB::table('room')->where('num',$num)->first();
		$status=DB::table('board')->insert(['name'=>$name,'room'=>$ob->room,'content'=>$content]);
		$dan['status']=$status;
		return response()->json($dan);
	}
}
