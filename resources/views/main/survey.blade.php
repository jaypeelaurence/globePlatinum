@extends('master')

	@section('title')
		Globe Platinum
	@endsection

	@section('heading')
		WHAT DO YOU THINK OF
	@endsection

	@section('customScript')
		<script type="text/javascript" src="{{ url('/') }}/js/form.js"></script>
	@endsection

	@section('body')
		<form method="POST" action="{{ url('/') }}">
			{{ csrf_field() }}
 			<div class="form-group" id="mobileNumber">
		    	<label>Your Globe Platinum Mobile Number</label>
			    <div class="mobCont">
			    	<span>09</span>
			    	<input type="text" class="form-control" name="mobileNumber" id="mobileNumber" aria-describedby="emailHelp" placeholder="XX-XXXXXXX" maxlength="9">
			    </div>
		  	</div>
	 		<div class="form-group" id="question5">
			    <label>Was the email that you received from Globe Platinum easy to understand?</label>
				<div class="form-check radio">
				  	<label class="form-check-label">
					  	<input class="form-check-input" id="question5" type="radio" name="question5" value="Yes">
					  	<span class="span"></span>
				    	Yes
				  	</label>
				</div>
				<div class="form-check radio">
				  	<label class="form-check-label">
					  	<input class="form-check-input" type="radio" name="question5" id="question5" value="No">
					  	<span class="span"></span>
				   		No
				  	</label>
				</div>
	 		</div>
 			<div class="form-group" id="question9">
		    	<label>If not, can you tell us which part of the email can we improve on?</label>
	     		<textarea class="form-control" name="question9" id="question9" rows="4"></textarea>
		  	</div>
 			<div class="form-group" id="question1">
			    <label>Were you able to chat with Thea?</label>
				<div class="form-check radio">
				  	<label class="form-check-label">
					  	<input class="form-check-input" id="question1" type="radio" name="question1" value="Yes">
					  	<span class="span"></span>
				    	Yes
				  	</label>
				</div>
				<div class="form-check radio">
				  	<label class="form-check-label">
					  	<input class="form-check-input" type="radio" name="question1" id="question1" value="No">
					  	<span class="span"></span>
				   		No
				  	</label>
				</div>
	 		</div>		
	 		<div id="NO">
		 		<div class="form-group" id="question6">
				    <label>Why not?</label>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question6" type="radio" name="question6" value="I don't have Facebook Messenger.">
						  	<span></span>
					    	I don't have Facebook Messenger.
					  	</label>
					</div>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question6" type="radio" name="question6" value="This service is not relevant to me.">
						  	<span></span>
						   		This service isn't relevant to me.
					  	</label>
					</div>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question6" type="radio" name="question6" value="Others, please specify:">
						  	<span></span>
					   		Others, please specify below:
					  	</label>
					</div>
	     			<textarea class="form-control" id="question7" name="question7" rows="4"></textarea>
		 		</div>
	 		</div>
	 		<div id="YES">
		 		<div class="form-group" id="question2">
				    <label>How would you rate your experience with Thea?</label>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Very satisfied">
						  	<span></span>
					    	Very satisfied
					  	</label>
					</div>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Somewhat satisfied">
						  	<span></span>
						    	Somewhat satisfied
					  	</label>
					</div>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Neither satisfied nor dissatisfied">
						  	<span></span>
						    	Neither satisfied nor dissatisfied
					  	</label>
					</div>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Somewhat dissatisfied">
						  	<span></span>
						    	Somewhat dissatisfied
					  	</label>
					</div>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Very dissatisfied">
						  	<span></span>
						    	Very dissatisfied
					  	</label>
					</div>
		 		</div>
	 			<div class="form-group" id="question3">
			    	<label>Can you give Thea a tip on how she can be a better digital assistant?</label>
		     		<textarea class="form-control" name="question3" id="question3" rows="4"></textarea>
			  	</div>
	 			<div class="form-group" id="question4">
				    <label>Will you most likely chat with Thea again?</label>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question4" type="radio" name="question4" value="Yes">
						  	<span></span>
						    	Yes
					  	</label>
					</div>
					<div class="form-check radio">
					  	<label class="form-check-label">
						  	<input class="form-check-input" id="question4" type="radio" name="question4" value="No">
						  	<span></span>
						   		No
					  	</label>
					</div>
			  	</div>
			  	<div class="form-group" id="question8">
				    <label>If not, please share with us your reason/s and the actual experience.</label>
	     			<textarea class="form-control" id="question8" name="question8" rows="4"></textarea>
			  	</div>
		  	</div>
	 		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection