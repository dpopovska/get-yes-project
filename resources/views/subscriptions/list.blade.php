@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	@include('layouts.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Subscriptions</span>
		</div>

	    <!-- main content inner -->
	    <div class="mc-inner">

			<div class="grid">
				<div class="grid-row">
			        <div class="widget red">
	                    <!-- Widget titlebar -->
	                    <div class="widget-titlebar">
	                        <span>Subscriptions</span>
	                        <div class="widget-actions">
	                            <a class="wa-settings" href="javascript:;"></a>
	                        </div>
	                    </div>
	                    <!-- Widget titlebar -->

	                    <!-- Widget main content -->
	                    <div class="widget-content-wrapper">
	                        <div class="widget-content">
	                            <table id="datatable" class="datatables display responsive dataTable" cellspacing="0" width="100%">
	                                <thead>
										<tr>
											<th>#</th>
											<th>Email</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										@foreach($subscriptions as $br => $subscription)
											<tr>
												<td>{{ ++$br }}</td>
												<td>{{ $subscription->email }}</td>
												<td>{{ $subscription->created_at->format('d.m.Y') }}</td>
											</tr>
										@endforeach
									</tbody>
	                            </table>
	                        </div>
	                    </div>
	                    <!-- Widget main content -->
	                </div>
				</div>
			</div>

	    </div>
	    <!-- Main content titlebar -->

	</div>
</div>

@stop
