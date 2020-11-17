<?php

// public routes

// Route group for authenticated users only

Route::group(['middleware' => ['auth:api']], function () {
    //---
});



// Route group for guest users only

Route::group(['middleware' => ['guest:api']], function () {
    Route::post('register', 'Auth\RegisterController@register');
});
