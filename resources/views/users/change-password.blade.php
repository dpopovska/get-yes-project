@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	<!-- Include left col -->
	@include('layouts.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Change password</span>
	    </div>
	    <!-- main content inner -->

	    <!-- main content inner -->
	    <div class="mc-inner">

			@include('errors.formerrors')

	    	<div class="buttons-cont">
				<div class="col-2">
					<a class="default-button default-abutton red fl-left" href="{{ URL::route('users.index') }}">Back</a>
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

						<!-- Widget main content -->
						<div class="widget-content-wrapper">

							<div class="widget-content">
								{!! Form::open(array('url' => URL::route('post-inner-admin-change-pass', $id), 'method' => 'POST', 'class'=>"default-form")) !!}
									<!-- Form group wrapper -->
									<div class="form-group-wrapper">

										<div class="form-group">
						                    <span class="fg-title">New password</span>
						                    <div class="fg-field">
						                        <input type="password" class="fg-input-field" name="password">
						                    </div>
						                </div>

						                <div class="form-group">
						                    <span class="fg-title">Confirm new password</span>
						                    <div class="fg-field">
						                        <input type="password" class="fg-input-field" name="password_confirmation">
						                    </div>
						                </div>

										<!-- Regular half inputs -->
										<div class="form-group">
											<div class="col-4">
												<input type="submit" class="default-button cyan fl-left" value="Change password">
											</div>
										</div>

									</div>
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
