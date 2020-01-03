<?php
Route::group(['namespace' => 'Email'], function() {
    Route::resource('email', 'EmailsController');
    Route::post('/get-emails', 'PostsController@getDataTable')->name('email.get');
});
