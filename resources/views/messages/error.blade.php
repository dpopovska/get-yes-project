@if(Session::has('error') || (isset($error) && $error != ''))
	<div class="large-notification error">
		@if(Session::has('error'))
			<p>{{ Session::get('error') }}</p>
		@else 
			<p>{{ $error }}</p>
		@endif
		<a class="ln-close" href="javascript:;"></a>
	</div>
@endif