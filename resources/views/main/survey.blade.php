@extends('master')

	@section('title')
		Globe Platinum
	@endsection

	@section('heading')
		What do you think of
	@endsection

	@section('body')
		<form method="POST" action="{{ url('/') }}/survey">
			{{ csrf_field() }}
 			<div class="form-group" id="mobileNumber">
		    	<label>Your Globe Platinum Mobile Number</label>
			    <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" aria-describedby="emailHelp" placeholder="0917 XXX XXXX">
		  	</div>
 			<div class="form-group" id="question1">
			    <label>Were you able to chat with Thea?</label>
				<div class="form-check">
				  	<input class="form-check-input" id="question1" type="radio" name="question1" value="Yes">
				  	<label class="form-check-label">
				    	Yes
				  	</label>
				</div>
				<div class="form-check">
				  	<input class="form-check-input" type="radio" name="question1" id="question1" value="No">
				  	<label class="form-check-label">
				   		No
				  	</label>
				</div>
	 		</div>
	 		<div id="NO">
		 		<div class="form-group" id="question6">
				    <label>Why not</label>
					<div class="form-check">
					  	<input class="form-check-input" id="question6" type="radio" name="question6" value="I don't have an FB messenger">
					  	<label class="form-check-label">
					    	I don't have an FB messenger
					  	</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" id="question6" type="radio" name="question6" value="This service is not related to me">
					  	<label class="form-check-label">
					   		This service is not related to me
					  	</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" id="question6" type="radio" name="question6" value="Others">
					  	<label class="form-check-label">
					   		Others
					  	</label>
					</div>
	     			<textarea class="form-control" id="question7" name="question7" rows="4"></textarea>
		 		</div>
	 		</div>
	 		<div id="YES">
		 		<div class="form-group" id="question2">
				    <label>How would you rate your experience with Thea?</label>
					<div class="form-check">
					  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Very satisfied">
					  	<label class="form-check-label">
					    	Very satisfied
					  	</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Somewhat satisfied">
					  	<label class="form-check-label">
					    	Somewhat satisfied
					  	</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Neither satisfied nor dissatisfied">
					  	<label class="form-check-label">
					    	Neither satisfied nor dissatisfied
					  	</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Somewhat dissatisfied">
					  	<label class="form-check-label">
					    	Somewhat dissatisfied
					  	</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" id="question2" type="radio" name="question2" value="Very dissatisfied">
					  	<label class="form-check-label">
					    	Very dissatisfied
					  	</label>
					</div>
		 		</div>
	 			<div class="form-group" id="question3">
			    	<label>Is there anything Thea can do to make your experience better?</label>
		     		<textarea class="form-control" name="question3" id="question3" rows="4"></textarea>
			  	</div>
	 			<div class="form-group" id="question4">
				    <label>Will you most likely chat with Thea again?</label>
					<div class="form-check">
					  	<input class="form-check-input" id="question4" type="radio" name="question4" value="Yes">
					  	<label class="form-check-label">
					    	Yes
					  	</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" id="question4" type="radio" name="question4" value="No">
					  	<label class="form-check-label">
					   		No
					  	</label>
					</div>
	     			<textarea class="form-control" id="question5" name="question5" rows="4"></textarea>
			  	</div>
		  	</div>
	 		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	@endsection