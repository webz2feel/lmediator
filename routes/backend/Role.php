<?php
Route::group(['namespace' => 'Role'], function() {
    Route::resource('role', 'RolesController');
    Route::post('/get', 'RolesController@getDataTable')->name('role.get');
});
