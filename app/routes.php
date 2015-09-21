<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'PagesController@form');

Route::get('/form','PagesController@form');
Route::post('/flights','PagesController@flights');
Route::post('/storeflights','PagesController@storeflights');
Route::post('/updateflights','PagesController@updateflights');
Route::get('/update','PagesController@daterunall');
Route::post('/bookings','PagesController@bookings');
Route::post('/confirm','PagesController@confirm');
Route::get('/scan','PagesController@scan');
Route::post('/autocomplete', 'PagesController@autocomplete');
Route::get('/daterunall','PagesController@daterunall');
Route::get('/cheapestprice','PagesController@cheapestprice');
//Route::get('laravel/users', 'PagesController@users');

/* --- Airline Interface  */

Route::controller('airlines', 'AirlinesController');
Route::controller('import', 'ImportController');
Route::controller('setting', 'SettingController');


/*
Route::get('/airlines', 'AirlinesController@home');
Route::get('/airlines/addflights','AirlinesController@addflights');
Route::get('/airlines/review','AirlinesController@review');
Route::get('/airlines/browse','AirlinesController@browse');
Route::get('/airlines/approve','AirlinesController@approve');
Route::get('/airlines/template','AirlinesController@thome');
Route::get('ajax1', 'AirlinesController@ajax');
Route::get('api', function(){
  // Get the number of days to show data for, with a default of 7
  $days = Input::get('days', 7);

  $range = CarbonCarbon::now()->subDays($days);

  $stats = DB::table('airstats')
    ->where('date1', '>=', $range)
    ->groupBy('date1')
    ->orderBy('date1', 'ASC')
    ->get();

  return $stats;
});
Route::get('/airlines/ajaxbrowse', 'AirlinesController@ajaxbrowse');
Route::post('/airlines/browse', 'AirlinesController@browse');

Route::get('/login','SessionsController@create');
Route::get('/logout','SessionsController@destroy');
Route::resource('sessions','SessionsController');
Route::get('/profile', function()
{
	return "Welcome. Your email id is: ".Auth::user()->email;
})->before('auth');

*/
// Anil Write Here

Route::controller('user', 'UserController');