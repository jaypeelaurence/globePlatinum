<?php
	use Illuminate\Http\Request;

	Route::get('/survey', function () {
	    return view('main.survey');
	});

	Route::post('/survey', function (Request $request) {
	    // return $request->all();
        return redirect('thankyou/'. md5('AdSp@rk!123'.now()));
	});

	Route::get('/thankyou/{key}', function ($key) {
		if($key ==  md5('AdSp@rk!123' . now())){
		    return view('main.thankyou');
		}else{
        	return redirect('survey');
		}
	});