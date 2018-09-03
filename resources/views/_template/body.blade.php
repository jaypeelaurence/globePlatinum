<div id="mainWrapper">
	<div id="headWrapper">
		<div id="container">
			<div class="topBorder">
				<img src="{{ url('/') }}/images/globeplatinum.png">
			</div>
			<div style="display: table; width: 100%; height: 100%;">
				<div class="heroWrapper" style="display: table-cell;">
					<h1>@yield('heading')</h1>
				</div>
			</div>
			<img class="mainPic" src="{{ url('/') }}/images/asktea.png">
		</div>
	</div>
	<div id="contentWrapper">
		<div id="container">
			@if (session()->has('message'))
				<div class='alert'>
					<i class='fa fa-check-circle'></i>{{ session()->get('message') }}
				</div>
			@endif
			@yield('body')
		</div>
	</div>
</div>