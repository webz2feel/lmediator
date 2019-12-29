<?php
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::post('/update-settings/{setting}', 'SettingsController@updateBasic')->name('basic.settings');
Route::post('/update-email/{setting}', 'SettingsController@updateEmail')->name('email.settings');
