<?php
Route::group(['namespace' => 'Role'], function() {
    Route::resource('role', 'RolesController');
    Route::post('/get-roles', 'RolesController@getDataTable')->name('role.get');
});
