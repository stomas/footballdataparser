<?php
Route::group(['middleware' => ['web']], function () {
    Route::get('/footballdata', 'Stomas\Footballdataparser\Controllers\FootballDataController@form');
    Route::get('/getelos', 'Stomas\Footballdataparser\Controllers\FootballDataController@getElos');
    Route::post('/store', 'Stomas\Footballdataparser\Controllers\FootballDataController@store');
    Route::get('/getTeams', 'Stomas\Footballdataparser\Controllers\FootballDataController@getTeams');
});