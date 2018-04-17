<?php

Route::group(['prefix' => 'v1', 'namespace' => '\API'], function () {
    Route::resource('categories', 'CategoryController', ['only' => ['index','show']]);
});