<?php
	use Illuminate\Support\Facades\DB;
	use Illuminate\Http\Request;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\Mail;

	use Illuminate\Support\Facades\Storage;

	use App\Email;

	Route::get('/survey', function (){
	    return view('main.survey');
	});

	Route::post('/survey', function (Request $request){
		$message = 'Date,Your Globe Platinum Mobile Number,Were you able to chat with Thea?,How would you rate your experience with Thea?,Is there anything Thea can do to make your experience better?,Why not?,If no, what about your experience did you not like?,Will you most likely chat with Thea again?,' . "\n";

		$body = new \stdClass();

        foreach($request->all() as $key => $value){
            $body->{$key} = $value;
        }

    	$body->date = date('Y-m-d h:m');

        $body->subject = "Globe Platinum Ask Thea Survey";

        $message .= $body->date . ',';
        $message .= '0917'.$request->mobileNumber . ',';
        $message .= $request->question1 . ',';
        $message .= ($request->question2 ?? 'N/A') . ',';
        $message .= ($request->question3 ?? 'N/A') . ',';
        $message .= ($request->question6 ?? 'N/A') . ',';
        $message .= ($request->question7 ?? 'N/A') . ',';
        $message .= ($request->question4 ?? 'N/A') . ',';
        $message .= ($request->question5 ?? 'N/A') . ',';
        $message .= "\n";

		$fileName = 'globe_platinum_edm-' . time() . '.csv';

        Storage::disk('public_uploads')->put($fileName, $message);

 	  	$email = new Email($body);

        Mail::to([
        	'jaypee@adspark.ph',
        	'reese@adspark.ph',
            'wellamie@adspark.ph',
        	'ginnie@adspark.ph',
            'ycunda@globe.com.ph',
            'jealcantara@globe.com.ph',
            'cdloyola@globe.com.ph',
        ])->send($email->sendingFile($body->subject, $fileName));

        return redirect('thankyou/'. md5('AdSp@rk!123'.now()));
	});

	Route::get('/thankyou/{key}', function ($key) {
		if($key ==  md5('AdSp@rk!123' . now())){
		    return view('main.thankyou');
		}else{
        	return redirect('survey');
		}
	});