<?php

Route::get('/', function () {
    return view('panel');
})->name('panel');

//Users
Auth::routes();

Route::get('/login/user-register', 'UserController@showRegister')->name('showRegister.user');
Route::get('/login/user-login', 'UserController@showLogin')->name('showLogin.user');
Route::get('/logout', 'UserController@logout')->name('logout.user');
//Route::get('/user', 'UserController@showTopics')->name('show.topics');
Route::post('/login/user-verify', 'UserController@login')->name('login.user');
Route::post('/login/user-create', 'UserController@store')->name('store.user');

//Topics
Route::get('/topics', 'TopicController@index')->name('index.topics');
Route::get('/topic-show/{id}', 'TopicController@showTopic')->name('show.topic');
Route::get('/topic-create', 'TopicController@createTopic')->name('create.topic');
Route::get('/topic-edit/{id}', 'TopicController@editTopic')->name('edit.topic');

Route::post('/topic-store', 'TopicController@storeTopic')->name('store.topic');
Route::post('/topic-update', 'TopicController@updateTopic')->name('update.topic');

//Answers
Route::get('/select-answer', function () {
    return view('select-answer');
});

Route::post('/answer-store', 'AnswersController@storeAnswer')->name('store.answer');

Route::get('/home', 'HomeController@index')->name('home');


