$(document).ready(function(){
	$("form").children('button').prop('disabled',true);
	$("form").children('button').addClass('disable');

	var $validMobileNUmber = 0;
	var $valid = 0;
	var $question5 = 0;
	var $question6 = 0;
	var $question2 = 0;
	var $question3 = 0;
	var $question4 = 0;

	var validate = {
		form: function(){
			$valid = 0;

			if($validMobileNUmber == 1 && $question5 == 1 && $question6 == 1 && $question2 == 1 && $question3 == 1 && $question4 == 1){
				$valid = 1;
			}

			if($valid == 1){
				$("form").children('button').prop('disabled',false);
				$("form").children('button').removeClass('disable');
			}else{
				$("form").children('button').prop('disabled',true);
				$("form").children('button	').addClass('disable');
			}
		},
		status: function(){
			console.log([$validMobileNUmber, $question5, $question6, $question2, $question3, $question4]);
		}
	}

	$("input#mobileNumber").keypress(function($char){
	    var $charCode = ($char.which) ? $char.which : $char.keyCode
	    if ($charCode > 31 && ($charCode < 48 || $charCode > 57))
	        return false;
		    return true;
	});

	$('input#mobileNumber').keyup(function(){
		$validMobileNUmber = 0;

		if($(this).val().length == 9){
			$validMobileNUmber = 1;
		}

		validate.form();
		validate.status();
	});

	$('input#mobileNumber').change(function() {
		$validMobileNUmber = 0;

		if($(this).val().length == 9){
			$validMobileNUmber = 1;

			$("div.error-display").remove();
		}else if ($(this).val().length == 0){
			$("div.error-display").remove();
		}else {
			$("div.error-display").remove();
			$("div#mobileNumber").append("<div class='error-display'>Please enter your 11-digit mobile number</div>");
		}

		validate.form();
		validate.status();
  	});

	$('input#question5').change(function(){
		$question5 = 0;
		$question9 = 0;
		
		$('div#question9').css('display','none');

		$('textarea#question9').val("");

		if($(this).val() == "No"){
			$question5 = 0;

			$('div#question9').css('display','block');
		}else{
			$question5 = 1;
		}

		validate.form();
		validate.status(); //testing
	});

	$('textarea#question9').keyup(function(){
		if($(this).val().length >= 1){
			$question5 = 1;
		}else{
			$question5 = 0;
		}

		validate.form();
		validate.status(); //testing
	});

	$('input#question1').change(function(){
		$('div#question2').css('display','none');

		$('div#question3').css('display','none');
		$('div#question4').css('display','none');
		$('div#question6').css('display','none');
		$('div#question8').css('display','none');
		
		$('input#question2').prop('checked',false);
		$('textarea#question3').val("");
		$('input#question4').prop('checked',false);
		$('textarea#question5').val("");
		$('input#question6').prop('checked',false);
		$('textarea#question7').val("");
		$('textarea#question7').prop('disabled',true);

		if($(this).val() == "No"){
			$question6 = 0;
			$question2 = 1;
			$question3 = 1;
			$question4 = 1;
			$('div#question6').css('display','block');
		}else{
			$question6 = 1;
			$question2 = 0;
			$question3 = 0;
			$question4 = 0;
			$('div#question2').css('display','block');
			$('div#question3').css('display','block');
			$('div#question4').css('display','block');
		}

		validate.form();
		validate.status(); //testing
	});

	$('input#question2').change(function(){
		$question2 = 1;

		validate.form();
		validate.status(); //testing
	});

	$('textarea#question3').keyup(function(){
		if($(this).val().length >= 1){
			$question3 = 1;
		}else{
			$question3 = 0;
		}

		validate.form();
		validate.status(); //testing
	});

	$('input#question4').change(function(){
		$('div#question8').css('display','none');

		$('textarea#question8').val('');

		if($(this).val() == "No"){
			$question4 = 0;
			$('div#question8').css('display','block');
		}else{
			$question4 = 1;
			$('div#question8').css('display','none');
		}

		validate.form();
		validate.status(); //testing
	});

	$('textarea#question8').keyup(function(){
		if($(this).val().length >= 1){
			$question4 = 1;
		}else{
			$question4 = 0;
		}

		validate.form();
		validate.status(); //testing
	});

	$('input#question6').change(function(){
		$question6 = 0;
		$question7 = 0;

		$('textarea#question7').val("");

		if($(this).val() == "Others, please specify:"){
			$('textarea#question7').prop('disabled',false);
		}else{
			$question6 = 1;
			$('textarea#question7').prop('disabled',true);
		}

		validate.form();
		validate.status(); //testing
	});

	$('textarea#question7').keyup(function(){
		if($(this).val().length >= 1){
			$question6 = 1;
		}else{
			$question6 = 0;
		}

		validate.form();
		validate.status(); //testing
	});
});