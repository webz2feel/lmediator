<?php
Route::group(['namespace' => 'User'], function() {
    Route::resource('user', 'UsersController');
    Route::post('/get-users', 'UsersController@getDataTable')->name('user.get');
});
