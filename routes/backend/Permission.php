<?php
Route::group(['namespace' => 'Permission'], function() {
    Route::resource('permission', 'PermissionsController');
    Route::post('/get', 'PermissionsController@getDataTable')->name('permission.get');
});
