<?php
use App\Task;
use App\sistem;

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
    return view('welcome');
});


Route::put('tasks/{id}/complete','TaskController@complete')->name('tasks.complete');
Route::resource('tasks', 'TaskController');
Route::get('sistem','SistemController@index');

// Route::get('data_task',function() {
//     $sistem = sistem::find(8);
//     return $sistem->Task;
// });
