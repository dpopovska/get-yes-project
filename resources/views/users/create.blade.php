@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	<!-- Include left col -->
	@include('layouts.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Add new user</span>
	    </div>
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
								{!! Form::open(array('url' => URL::to('users'), 'method' => 'POST', 'class'=>"default-form")) !!}
									<!-- Form group wrapper -->
									<div class="form-group-wrapper">
										<!-- Regular input -->
										<div class="form-group">
											<span class="fg-title mandatory">First name and Last name</span>
											<div class="fg-field">
												{!! Form::text('name', null, ['class'=>'fg-input-field']) !!}
											</div>
										</div>
										<!-- Regular input -->

										<!-- Regular input -->
										<div class="form-group">
											<span class="fg-title mandatory">Email address</span>
											<div class="fg-field">
												{!! Form::text('email', null, ['class'=>'fg-input-field']) !!}
											</div>
										</div>
										<!-- Regular input -->

										<!-- Regular input -->
										<div class="form-group">
											<span class="fg-title mandatory">Password</span>
											<div class="fg-field">
												{!! Form::password('password', ['class'=>'fg-input-field']) !!}
											</div>
										</div>
										<!-- Regular input -->

										<!-- Select dropdown -->
										<div class="form-group">
											<span class="fg-title mandatory">Role</span>
											<div class="select-two-wrapper">
												{!! Form::select('roles_id', $roles, null, ['placeholder' => 'Select a role', 'class'=>'select-two-field']) !!}
											</div>
										</div>
										<!-- Select dropdown -->

										<!-- Regular half inputs -->
										<div class="form-group">
											<div class="col-4">
												<input type="submit" class="default-button cyan fl-left" value="Create">
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
