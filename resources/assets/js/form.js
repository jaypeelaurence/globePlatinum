$(document).ready(function(){
	$("form").children('button').prop('disabled',true);
	$("form").children('button').addClass('disable');

	var $validMobileNUmber = 0;
	var $valid = 0;
	var $question7 = 0;
	var $question1 = 0;
	var $question2 = 0;
	var $question3 = 0;
	var $question5 = 0;

	var validate = {
		form: function(){
			if($question1 == 1 && $question2 == 1 && $question5 == 1 && $question3 == 1){
				$valid = 1;
			}

			if($validMobileNUmber == 1 && $valid == 1){
				$("form").children('button').prop('disabled',false);
				$("form").children('button').removeClass('disable');
			}else{
				$("form").children('button').prop('disabled',true);
				$("form").children('button').addClass('disable');
			}
		},
		status: function(){
			console.log($validMobileNUmber + " | " + $valid + " / " + $question1 + " | " + $question2 + " | " + $question3 + " | " + $question5);
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
		validate.status(); //testing
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
		validate.status(); //testing
  	});

	$('input#question1').change(function(){
		$("form").children('button').addClass('disable');

		$valid = 0;
		$question1 = 0;
		$question2 = 0;
		
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
			$('div#question6').css('display','block');
		}else{	
			$('div#question2').css('display','block');
			$('div#question3').css('display','block');
			$('div#question4').css('display','block');
		}

		validate.form();
		validate.status(); //testing
	});

	$('input#question6').click(function(){
		$question7 = 0;
		$valid = 0;

		$('textarea#question7').val('');

		if($(this).val() == "Others"){
			$('textarea#question7').prop('disabled',false);
		}else{
			$valid = 1;
			$('textarea#question7').prop('disabled',true);
		}

		validate.form();
		validate.status(); //testing
	});

	$('textarea#question7').keyup(function(){
		if($(this).val().length >= 1){
			$valid = 1;
		}else{
			$valid = 0;
		}

		validate.form();
		validate.status(); //testing
	});

	$('input#question2').click(function(){
		$question1 = 1;

		validate.form();
		validate.status(); //testing
	});

	$('input#question4').click(function(){
		$question2 = 0;
		$valid = 0;

		$('textarea#question5').val('');

		if($(this).val() == "No"){
			$question2 = 1;
			$question5 = 0;

			$('div#question8').css('display','block');
		}else{
			$question2 = 1;
			$question5 = 1;

			$('div#question8').css('display','none');
		}

		validate.form();
		validate.status(); //testing
	});

	$('textarea#question5').keyup(function(){
		if($(this).val().length >= 1){
			$question5 = 1;
		}else{
			$valid = 0;
			$question5 = 0;
		}

		validate.form();
		validate.status(); //testing
	});

	$('textarea#question3').keyup(function(){
		if($(this).val().length >= 1){
			$question3 = 1;
		}else{
			$valid = 0;
			$question3 = 0;
		}

		validate.form();
		validate.status(); //testing
	});
});