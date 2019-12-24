<?php
Route::group(['namespace' => 'Permission'], function() {
    Route::resource('permission', 'PermissionsController');
    Route::post('/get-permissions', 'PermissionsController@getDataTable')->name('permission.get');
});
