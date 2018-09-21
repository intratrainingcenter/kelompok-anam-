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
  Route::prefix('kelas')->group(function(){
    Route::get('/','ClassController@index')->name('kelas.index');
    Route::Post('/add','ClassController@store')->name('kelas.add');
    Route::Post('/update','ClassController@update')->name('kelas.update');
    Route::delete('/delete','ClassController@delete')->name('kelas.delete');
  });
  Route::get('/piket','schoolController@piket')->name('school.piket');
  Route::prefix('mata_pelajaran')->group(function(){
    Route::get('/','SubjectsController@index')->name('mata_pelajaran.index');
    Route::post('/add','SubjectsController@create')->name('mata_pelajaran.add');
  });
  Route::get('/absen','schoolController@absen')->name('school.absen');
});
