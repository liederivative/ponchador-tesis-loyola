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

//Route::get('/', function () {
//    return redirect()->route('home');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    
    
    Route::match(['get','post'],'exe', 'Exe@index');

    Route::get('/asignatura/{param}', 'Asignatura@index');
    
    Route::get('/profesor/{param}', 'Profesor@index');
    
    Route::get('/horario/{param}', 'Horario@index');
    
    Route::get('/clase/{param}', 'Clase@index');
    
    Route::get('/report/{param}', 'Report@index');
    
    

    Route::group(['prefix'=>'admin','middleware' => ['role:admin|root']],function () {
        
        Route::get('/', 'Admin@index')->name('admin');
        
        Route::put('user', 'UserAPI@store');
        Route::get('user/search/{unique}', 'UserAPI@search');
        Route::resource('user','UserAPI');
        
        Route::put('role', 'RoleAPI@store');
        Route::get('role/search/{unique}', 'RoleAPI@search');
        Route::resource('role','RoleAPI');

        Route::put('perm', 'PermAPI@store');
        Route::get('perm/search/{unique}', 'PermAPI@search');
        Route::resource('perm','PermAPI');

        Route::middleware(['role:root'])->group(function () {
            
            Route::patch('uni/reset/{unique}', 'UniAPI@resetUser');
            Route::put('uni/seed', 'UniAPI@seed');
            Route::put('uni', 'UniAPI@store');
            Route::get('uni/search/{unique}', 'UniAPI@search');
            Route::resource('uni','UniAPI');
            
        });
        
    });
    
    
    
    
    
    Route::get('/logout', 'Admin@logout');
    
    
});
