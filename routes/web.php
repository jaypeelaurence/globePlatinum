<?php
	use Illuminate\Support\Facades\DB;
	use Illuminate\Http\Request;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\Mail;

	use App\Email;

	Route::get('/survey', function (){
	    return view('main.survey');
	});

	Route::post('/survey', function (Request $request) {
		// return $request->all(); 
        $body = new \stdClass();

        foreach($request->all() as $key => $value){
        	$body->{$key} = $value;
        }

    	$body->date = date('Y-m-d h:m');

        $body->subject = "Globe Platinum EDM | Ask Thea Survey";

 	  	$email = new Email($body);

        Mail::to('jaypeelaurencecocjin@gmail.com')->send($email->entry($body->subject));

        return redirect('thankyou/'. md5('AdSp@rk!123'.now()));
	});

	Route::get('/thankyou/{key}', function ($key) {
		if($key ==  md5('AdSp@rk!123' . now())){
		    return view('main.thankyou');
		}else{
        	return redirect('survey');
		}
	});