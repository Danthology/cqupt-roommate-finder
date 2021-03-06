<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 这里是您可以注册应用程序的Web路由的地方。
*/
/*
*亲爱的项目部同志们：

**你是第（3）个尝试对该套代码进行维护的人

**浪费在这里的总时间为（200）小时

*后来者请自觉维护注释中的两个数字变量，请做好累加工作，以示后人谨慎操作

*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('roommate',function(){
	return view('room');
});
Route::get('roomfinder',function(){
	return view('room');
});
Route::get('checkroom',function(){
	return view('index');
});
Route::get('api','Playcontroller@token');
Route::group(['prefix'=>'action/info_submit','middleware'=>'throttle:10,1'],function(){
    Route::post('/','RoomController@room');
});
Route::group(['prefix'=>'action/comment_submit','middleware'=>'throttle:2,1'],function(){
    Route::post('/','RoomController@word');
});
