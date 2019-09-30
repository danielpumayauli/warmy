<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
 return view('login');
 // return view('login');
});

/*
Route::get('nuevo', function () {
    //return view('welcome');
   return view('login');
   });
*/

Route::get('/list-projects', 'ExplorerController@index2')->name('list-projects');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/form', 'FormController@index')->name('form');

Route::post('/form', 'FormController@store');
Route::post('/form/registerMember', 'FormController@storeMember');
Auth::routes();

Route::get('/project/{circleId}', 'ProjectController@show');

// Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function (){
// });

Route::middleware(['auth'])->group(function (){
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/home', 'ProfileController@index')->name('home');

    Route::post('/profile/test', 'ProfileController@test');

    Route::get('/my-circles', 'CircleController@index')->name('my-circles');

    // Route::get('/circle/new', 'CircleController@new');
    Route::resource('circle', 'CircleController');

    Route::get('/activity', 'ActivityController@index')->name('activity');
    Route::get('/other-circles', 'ExplorerController@index')->name('other-circles');

    Route::resource('profile', 'ProfileController');

    Route::get('/messages', 'MessagesController@index')->name('messages');
    Route::post('/messages/createMessage', 'MessagesController@storeMessage');
    Route::get('/messages/show', 'MessagesController@show');
    Route::get('/messages/findUser', 'MessagesController@findUser');

    Route::get('/news', 'NewsController@index')->name('news');

    Route::post('/project/posts/{shortNameProject}', 'PostController@store');

    Route::post('/project/registerUser', 'ProjectController@registerUser'); // Registrar solicitud de usuario del formulario
    Route::post('/project/approveUser', 'ProjectController@approveUser'); // Aprobar solicitud de usuario del formulario

    Route::get('/other-circles/findCircle', 'ExplorerController@findCircle');
});
