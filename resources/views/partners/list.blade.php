@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	@include('layouts.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Partners</span>
		</div>

	    <!-- main content inner -->
	    <div class="mc-inner">

			@include('messages.success')
			
			<!-- Grid -->
			<div class="buttons-cont">
				<div class="col-2">
					<a class="default-button default-abutton red fl-left" href="{{ URL::route('partners.create') }}">Add new partner</a>
				</div>
			</div>

			<div class="grid">
				<div class="grid-row">
			        <div class="widget red">
	                    <!-- Widget titlebar -->
	                    <div class="widget-titlebar">
	                        <span>Partners</span>
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
											<th>Name</th>
											<th>Link</th>
											<th>Description</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($partners as $br => $partner)
											<tr>
												<td>{{ ++$br }}</td>
												<td>{{ $partner->name }}</td>
												<td>{{ $partner->link }}</td>
												<td class="td-description"><span class="description-table-list">{{ $partner->description }}</span></td>
												<td>{{ $partner->created_at->format('d.m.Y') }}</td>
												<td>
													<a class="table-edit-icon" href="{{ URL::route('partners.edit', $partner->id) }}"></a>
													<a class="table-remove-icon" title="Delete partner" href="javascript:;" onclick="confirmMsg('Delete partner','Do you want to delete this partner?','<?php echo URL::route('delete-partner',$partner->id) ?>')"></a>
												</td>
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
