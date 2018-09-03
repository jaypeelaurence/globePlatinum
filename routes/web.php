<?php
	use Illuminate\Support\Facades\DB;
	use Illuminate\Http\Request;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\Mail;

	use Illuminate\Support\Facades\Storage;

	use App\Email;

	use PHPMailer\PHPMailer;

	Route::get('/', function (){
	    return view('main.survey');
	});

	Route::post('/', function (Request $request){
		$date = date('Y-m-d h:m');

		$message = 'Date,Your Globe Platinum Mobile Number,Was the email you received from Globe Platinum easy to understand?,If no can you give feedback on how to make communication better?,Were you able to chat with Thea?,Why not?,Others,How would you rate your experience with Thea?,Is there anything Thea can do to make your experience better?,Will you most likely chat with Thea again?,If no what about your experience did you not like?' . "\n";

        $message .= $date . ',';
        $message .= '09'.$request->mobileNumber . ',';
        $message .= $request->question5 . ',';
        $message .= ($request->question9 ? preg_replace('/(?:(?:,)|(?: )|(?:\r\n))/',' ',$request->question9) : 'N/A') . ',';
        $message .= $request->question1 . ',';
        $message .= ($request->question6 ?? 'N/A') . ',';
        $message .= ($request->question7 ? preg_replace('/(?:(?:,)|(?: )|(?:\r\n))/',' ',$request->question7) : 'N/A') . ',';
        $message .= ($request->question2 ?? 'N/A') . ',';
        $message .= ($request->question3 ? preg_replace('/(?:(?:,)|(?: )|(?:\r\n))/',' ',$request->question3) : 'N/A') . ',';
        $message .= ($request->question4 ?? 'N/A') . ',';
        $message .= ($request->question8 ? preg_replace('/(?:(?:,)|(?: )|(?:\r\n))/',' ',$request->question8) : 'N/A') . ',';
        $message .= "\n";

		$fileName = 'globe_platinum_edm-' . time() . '.csv';

        Storage::disk('public_uploads')->put($fileName, $message);

        $body = "<table border='1'>
		    <tr>
		        <td>
		            <b>Date:</b>
		        </td>
		        <td>
		            ".$date."
		        </td>
		    </tr>
		    <tr>
		        <td>
		            <b>Mobile Number</b>
		        </td>
		        <td>
		            09".$request->mobileNumber."
		        </td>
		    </tr>
		    <tr>
		        <td>
		            <b>Was the email you received from Globe Platinum easy to understand?</b>
		        </td>
		        <td>
		            ".$request->question5."
		        </td>
		    </tr>
		    <tr>
		        <td colspan='2'>
		            <b>If no, can you give feedback on how to make communication better?</b>
		        </td>
		    </tr>
		    <tr>
		        <td colspan='2'>
		            ".($request->question9 ?? 'N/A')."
		        </td>
		    </tr>
		    <tr>
		        <td>
		            <b>Were you able to chat with Thea?</b>
		        </td>
		        <td>
		            ".$request->question1."
		        </td>
		    </tr>
		    <tr>
		        <td>
		            <b>Why not?</b>
		        </td>
		        <td>
		            ".($request->question6 ?? 'N/A')."
		        </td>
		    </tr>
		    <tr>
		        <td colspan='2'>
		            <b>Others, please specify:</b>
		        </td>
		    </tr>
		    <tr>
		        <td colspan='2'>
		            ".($request->question7 ?? 'N/A')."
		        </td>
		    </tr>
		    <tr>
		        <td>
		            <b>How would you rate your experience with Thea?</b>
		        </td>
		        <td>
		            ".($request->question2 ?? 'N/A')."
		        </td>
		    </tr>
		    <tr>
		        <td colspan='2'>
		            <b>Is there anything Thea can do to make your experience better?</b>
		        </td>
		    </tr>
		    <tr>
		        <td colspan='2'>
		            ".($request->question3 ?? 'N/A')."
		        </td>
		    </tr>
		    <tr>
		        <td>
		            <b>Will you most likely chat with Thea again?</b>
		        </td>
		        <td>
		            ".($request->question4 ?? 'N/A')."
		        </td>
		    </tr>
		    <tr>
		        <td colspan='2'>
		            <b>If no, what about your experience did you not like?</b>
		        </td>
		    </tr>
		    <tr>
		        <td colspan='2'>
		            ".($request->question8 ?? 'N/A')."
		        </td>
		    </tr>
		</table>";
		
		$mail = new PHPMailer\PHPMailer();

		$mail->SMTPDebug = 2;
	    $mail->isSMTP();
	    $mail->Host = 'smtp.gmail.com';
	    $mail->Username = 'adspark.globe.edm@gmail.com';
   		// $mail->Password = 'kygyfrjosfldkaak';
   		$mail->Password = 'kygyfr2josfldkaak';
   		$mail->SMTPSecure = 'tls';
   		$mail->SMTPAuth = true;
   		$mail->Port = 587;
   		$mail->setFrom('adspark.globe.edm@gmail.com', 'Globe Platinum');
    	$mail->addAddress('jaypeelaurencecocjin@gmail.com', 'Jaypee');

	    // $mail->Host = 'smtpout.asia.secureserver.net';
	    // $mail->Username = 'form@globeplatinumsurvey.com';
	    // $mail->Password = 'admin123';
	    // $mail->Port = 25;
	    // $mail->setFrom('form@globeplatinumsurvey.com', 'Globe Platinum');
	    // $mail->addAddress('adspark.globe.edm@gmail.com', 'Ask Thea');
	    // $mail->addCC('adsparktester@gmail.com');

	    $mail->isHTML(true);
	    $mail->Subject = 'Globe Platinum Ask Thea Survey';
	    $mail->Body = $body;

	    $fileAttachement = public_path() . '/files/' . $fileName;
    	$mail->addAttachment($fileAttachement);

	    if (!$mail->send()) {
		    return redirect('/')->with('message', "Error: Please try again");
		}else {
       		return redirect('thankyou/'. strtotime('now'));
		}
	});

	Route::get('/thankyou/{key}', function ($key) {
		if(strtotime('-10 seconds') <= $key || $key >= strtotime('+10 seconds')){
		    return view('main.thankyou');
		}else{
        	return redirect('/');
		}
	});