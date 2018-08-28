Date: {{ $body->date }} <br>
Mobile Number: 0917{{ $body->mobileNumber }} <br>
Were you able to chat with Thea?: {{ $body->question1 }} <br>
How would you rate your experience with Thea?: @php echo ($body->question2 ?? 'N/A'); @endphp <br>
Is there anything Thea can do to make your experience better?: @php echo ($body->question3 ?? 'N/A'); @endphp <br>
Why not?: @php echo ($body->question6 ?? 'N/A');  @endphp <br>
@php echo ($body->question7 ?? 'N/A');  @endphp <br>
Will you most likely chat with Thea again?: @php echo ($body->question4 ?? 'N/A');  @endphp <br>
@php echo ($body->question5 ?? 'N/A');  @endphp <br>