<?php

Route::get('/footballdata', 'Stomas\Footballdataparser\Controllers\FootballDataController@form');
Route::post('/store', 'Stomas\Footballdataparser\Controllers\FootballDataController@store');