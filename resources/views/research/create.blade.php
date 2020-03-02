@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">
	<!-- Include left col -->
	@include('layouts.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Add new research</span>
		</div>

	    <!-- main content inner -->
	    <div class="mc-inner">

	    	@include('errors.formerrors')

	    	<div class="buttons-cont">
				<div class="col-2">
					<a class="default-button default-abutton red fl-left" href="{{ URL::route('research.index') }}">Back</a>
				</div>
			</div>

		    <div class="grid-row">
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

						<div class="widget-content-wrapper">
							<div class="widget-content">
							{!! Form::open(array('url' => URL::to('research'), 'method' => 'POST', 'class'=>'default-form', 'files' => true)) !!}
								@include('research.form', ['buttonName'=>'Create'])
							{!! Form::close() !!}
							</div>
						</div>

					</div>
				</div>
				<!-- Column -->
			</div>

		</div>
	</div>

</div>

@stop
