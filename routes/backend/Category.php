<?php
Route::group(['namespace' => 'Blog'], function() {
    Route::resource('category', 'CategoriesController');
    Route::post('/get-cat', 'CategoriesController@getDataTable')->name('category.get');
    Route::post('category/update', 'CategoriesController@update')->name('category.update');
    Route::get('category/destroy/{id}', 'CategoriesController@destroy')->name('category.delete');
});
