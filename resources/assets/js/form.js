$(document).ready(function(){
	$("form").children('button').prop('disabled',true);
	$("form").children('button').addClass('disable');

	var $validMobileNUmber = 0;
	var $valid = 0;
	var $question1 = 0;
	var $question2 = 0;

	$("input#mobileNumber").keypress(function(char){
	    var charCode = (char.which) ? char.which : event.keyCode
	    if (charCode > 31 && (charCode < 48 || charCode > 57))
	        return false;
		    return true;
	});

	$('input#mobileNumber').change(function(){
		if($(this).val().length == 7){
			$validMobileNUmber = 1;

			$("div.error").remove();
		}else{
			$validMobileNUmber = 0;

			$("div#mobileNumber").append("<div class='error-display'>incorrect mobile number.</div>");
		}
	});

	$("body").click(function(event){
		$('input#question1').change(function(){
			$("form").children('button').addClass('disable');

			$valid = 0;
			$question1 = 0;
			$question2 = 0;
			
			$('div#question2').css('display','none');

			$('div#question3').css('display','none');
			$('div#question4').css('display','none');
			$('div#question6').css('display','none');

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
		});

		if($(event.target).closest('div#YES').length == 1){

			// console.log($(event.target).attr('id'));

			if($(event.target).attr('id') == "question2"){
				$question1 = 1;
			}

			if($(event.target).attr('id') == "question4"){
				$question2 = 1;
			}

			if($question1 == 1 && $question2 == 1){
				$valid = 1;
			}

			console.log($valid);
		}

		$('input#question6').click(function(){
			$valid = 1;
			
			if($(this).val() == "Others"){
				$('textarea#question7').prop('disabled',false);
			}else{
				$('textarea#question7').prop('disabled',true);
			}
		});

		// console.log($validMobileNUmber + " / " + $valid);

		if($validMobileNUmber == 1 && $valid == 1){
			$("form").children('button').prop('disabled',false);
			$("form").children('button').removeClass('disable');
		}else{
			$("form").children('button').prop('disabled',true);
			$("form").children('button').addClass('disable');
		}
	});
});