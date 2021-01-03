<?php

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/topics', 'TopicsController@index')->name('index.topics');
Route::get('/select-topic/{id}', 'TopicsController@selectTopic')->name('select.topic');
Route::get('/topic-create', 'TopicsController@createTopic')->name('create.topic');

Route::post('/topic-store', 'TopicsController@storeTopic')->name('store.topic');


Route::get('/select-answer', function () {
    return view('select-answer');
});

Route::post('/select-answer', function () {
    return view('select-answer');
});

Route::get('/user-create', 'UserController@index')->name('index.user');
Route::post('/user-create/store', 'UserController@store')->name('store.user');