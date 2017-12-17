<?php

Route::group(['prefix' => 'staf','middleware' => ['web']], function() {
    Route::get('demo', 'Bantenprov\Staf\Http\Controllers\StafController@demo');

    Route::get('/','Bantenprov\Staf\Http\Controllers\StafController@index')->name('stafIndex');

    Route::get('/create','Bantenprov\Staf\Http\Controllers\StafController@create')->name('stafCreate');

    Route::post('/store','Bantenprov\Staf\Http\Controllers\StafController@store')->name('stafStore');

    Route::get('/view/{id}','Bantenprov\Staf\Http\Controllers\StafController@show')->name('stafShow');
    
    Route::get('/edit/{id}','Bantenprov\Staf\Http\Controllers\StafController@edit')->name('stafEdit');
    
    Route::get('/delete/{id}','Bantenprov\Staf\Http\Controllers\StafController@destroy')->name('stafDelete');
            
});
