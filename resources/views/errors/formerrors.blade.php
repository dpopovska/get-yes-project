@if($errors->any())
<!-- Page section -->
	<div class="large-notification error">
		<p>
		@foreach($errors->all() as $error)
			<span>{{ $error }}</span><br />
		@endforeach
		</p>
		<a class="ln-close" href="javascript:;"></a>
	</div>
@endif