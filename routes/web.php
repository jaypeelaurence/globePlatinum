<?php
	use Illuminate\Http\Request;

	Route::get('/survey', function () {
	    return view('main.form');
	});

	Route::post('/survey', function (Request $request) {
	    return $request->all();
	});