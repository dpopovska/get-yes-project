@extends('layouts/cmslayout')

@section('cmscontent')
<!-- CONTENT WRAPPER -->
<div class="content-wrapper">
	<!-- Include left col -->
	@include('layouts.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Edit an existing member</span>
		</div>

	    <!-- main content inner -->
	    <div class="mc-inner">

		    <div class="grid-row">

		    	@include('errors.formerrors')

		    	<div class="buttons-cont">
					<div class="col-2">
						<a class="default-button default-abutton red fl-left" href="{{ URL::route('about.index') }}">Back</a>
					</div>
				</div>

				<!-- Column -->
				<div class="col-6">
					<!-- Default widget -->
					<div class="widget red">
						<!-- Widget titlebar -->
						<div class="widget-titlebar">
							<span>Complete the form below</span>
							<div class="widget-actions">
								<a class="wa-settings" href="javascript:;"></a>
							</div>
						</div>
						<!-- Widget titlebar -->
						
						<!-- Widget main content -->
						<div class="widget-content-wrapper">
							<div class="widget-content">
								{!! Form::model($about, ['method'=> 'PATCH', 'route' => ['about.update', $about->id], 'class' => 'default-form', 'files' => true]) !!}
									@include('about-page.form', ['buttonName' => 'Edit'])
								{!! Form::close() !!}
							</div>
						</div>
					</div>
					<!-- Default widget -->
				</div>
				<!-- Column -->
			</div>
		</div>
	</div>
</div>
@stop
