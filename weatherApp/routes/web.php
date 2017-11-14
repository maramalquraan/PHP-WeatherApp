<?php

Route::get('/', function () {
    // if(!Schema::hasTable('weather')){
    //     Schema::create('weather', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('city');
    //         $table->save();
    //         });
    //   } 
    // $weather= new App\Weather;
    // $weather->city="Amman";
    return view('welcome');
});
Route::get('about', function () {
    return 'About Us';
});

