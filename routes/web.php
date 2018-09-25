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
Route::get('/Dashboard', 'schoolController@dashboard');
Route::prefix('school')->group(function(){
  Route::prefix('siswa')->group(function(){
    Route::get('/','StudentController@index')->name('siswa.index');
    Route::Post('/add','StudentController@store')->name('siswa.add');
    Route::Post('/update','StudentController@update')->name('siswa.update');
    Route::delete('/delete','StudentController@delete')->name('siswa.delete');
  });
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
    Route::post('/update','SubjectsController@update')->name('mata_pelajaran.update');
    Route::delete('/delete','SubjectsController@delete')->name('mata_pelajaran.delete');
  });
  Route::prefix('absen')->group(function(){
    Route::get('/','AbsenController@index')->name('absen.index');
    Route::post('/add','AbsenController@create')->name('absen.add');
    Route::delete('/delete','AbsenController@delete')->name('absen.delete');
  });
});
