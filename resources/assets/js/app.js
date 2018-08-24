$(document).ready(function(){
	$("body").click(function(){
		$('input#question1').change(function(){
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

			switch($(this).val()){
				case "No":
					$('div#question6').css('display','block');

					break;
				case "Yes":
					$('div#question2').css('display','block');
					$('div#question3').css('display','block');
					$('div#question4').css('display','block');

					break;
			}
		});
	});
});