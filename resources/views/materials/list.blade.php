@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	@include('layouts.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Materials</span>
		</div>

	    <!-- main content inner -->
	    <div class="mc-inner">

			@include('messages.success')
			
			<!-- Grid -->
			<div class="buttons-cont">
				<div class="col-2">
					<a class="default-button default-abutton red fl-left" href="javascript:;">Add new material item</a>
				</div>
			</div>

			<div class="grid">
				<div class="grid-row">
			        <div class="widget red">
	                    <!-- Widget titlebar -->
	                    <div class="widget-titlebar">
	                        <span>Materials</span>
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
											<th>Title</th>
											<th>Description</th>
											<th>Created by</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($materials as $br => $material)
											<tr>
												<td>{{ ++$br }}</td>
												<td>{{ $material->title }}</td>
												<td class="td-description"><span class="description-table-list">{{ $material->description }}</span></td>
												<td>{{ $material->creator->name }}</td>
												<td>{{ $material->created_at->format('d.m.Y') }}</td>
												<td>
													<a class="table-edit-icon" href="{{ URL::route('materials.edit', $material->id) }}"></a>
													<a class="table-remove-icon" title="Delete material" href="javascript:;" onclick="confirmMsg('Delete material','Do you want to delete these material item?','<?php echo URL::route('delete-material', $material->id) ?>')"></a>
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
