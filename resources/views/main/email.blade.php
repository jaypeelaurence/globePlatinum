<table border='1'>
	<tr>
		<td>
			<b>Date:</b>
		</td>
		<td>
			{{ $body->date }}
		</td>
	</tr>
	<tr>
		<td>
			<b>Mobile Number:</b>
		</td>
		<td>
			0917{{ $body->mobileNumber }}
		</td>
	</tr>
	<tr>
		<td>
			<b>Were you able to chat with Thea?:</b>
		</td>
		<td>
			{{ $body->question1 }}
		</td>
	</tr>
	<tr>
		<td>
			<b>How would you rate your experience with Thea?:</b>
		</td>
		<td>
			@php echo ($body->question2 ?? 'N/A'); @endphp
		</td>
	</tr>
	<tr>
		<td>
			<b>Is there anything Thea can do to make your experience better?:</b>
		</td>
		<td>
			@php echo ($body->question3 ?? 'N/A'); @endphp
		</td>
	</tr>
	<tr>
		<td>
			<b>Why not?:</b>
		</td>
		<td>
			@php echo ($body->question6 ?? 'N/A'); @endphp
		</td>
	</tr>
	<tr>
		<td colspan="2">
			@php echo ($body->question7 ?? 'N/A'); @endphp
		</td>
	</tr>
	<tr>
		<td>
			<b>Will you most likely chat with Thea again?:</b>
		</td>
		<td>
		 	@php echo ($body->question4 ?? 'N/A'); @endphp
		</td>
	</tr>
	<tr>
		<td colspan="2">
			@php echo ($body->question5 ?? 'N/A'); @endphp
		</td>
	</tr>
</table>