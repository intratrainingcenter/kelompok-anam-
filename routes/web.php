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
    return view('welcome');
});
Route::get('/nama/{id}', function($id){
  return $id;
});
Route::get('/test',function(){
  return 'test';
});
Route::get('/biasa', 'testpageController@index')->name('biasa');
Route::resource('/resource', 'testpageControllerApi');
Route::get('/middle/{param}', 'testpageController@middle')->middleware('next');
Route::get('/Dashboard', function(){
  return view('template.content');
});
Route::prefix('school')->group(function(){
  Route::get('/siswa','schoolController@siswa')->name('school.siswa');
  Route::get('/kelas','schoolController@kelas')->name('school.kelas');
  Route::get('/piket','schoolController@piket')->name('school.piket');
  Route::get('/mata_pelajaran','schoolController@mata_pelajaran')->name('school.mata_pelajaran');
  Route::get('/absen','schoolController@absen')->name('school.absen');
});
