@if(Session::has('error'))
<!-- Page section -->
	<div class="large-notification error">
		<p>{{ Session::get('error') }}</p>
		<a class="ln-close" href="javascript:;"></a>
	</div>
@endif