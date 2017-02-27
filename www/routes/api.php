<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware'=>'cors'], function(){
    Route::get('/message', function(){
        return "hello";
    });
});
Route::group(['prefix'=>'auth', 'middleware'=>'cors'],function(){

    Route::post('/{provider}', function(Request $request, $provider){

        $social_info = App\SocialInfo::with('app')->where('client_id',$request->clientId)->first();
        $service = collect($social_info)->only('client_id', 'client_secret', 'redirect');
        Config::set('services.'.$provider, $service->toArray() );

        $user = Socialite::driver($provider)->stateless()->user();
        return  compact('social_info', 'user');
    });



});
