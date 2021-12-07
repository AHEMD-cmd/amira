<?php

use App\Project;
use App\Site;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $projects = Project::take(4)->get();
    $site = Site::first();

    return view('home', compact('projects', 'site'));
});

Route::resource('project', 'ProjectController')->except(['destroy']);
Route::get('project/destroy/{id}', 'ProjectController@destroy')->name('project.destroy');
Route::get('cover/destroy/{id}', 'ProjectController@cover_destroy')->name('cover.destroy');
Route::get('image/destroy/{id}', 'ProjectController@image_destroy')->name('image.destroy');
Route::get('browse/all/', 'ProjectController@browse_all')->name('browse.all');

//routes for contact
Route::get('contact/index', 'ContactController@index')->name('contact.index');
Route::post('contact/store', 'ContactController@store')->name('contact.store');
Route::get('contact/destroy/{id}', 'ContactController@destroy')->name('contact.destroy');


Route::resource('site', 'SiteController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
