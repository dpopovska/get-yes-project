@if(Session::has('success'))
<!-- Page section -->
	<div class="widget-notification success">
		<span>{{ Session::get('success') }}</span>
		<a class="ln-close" href="javascript:;"></a>
	</div>
@endif

