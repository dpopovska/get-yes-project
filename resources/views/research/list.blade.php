@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	@include('layouts.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Research</span>
		</div>

	    <!-- main content inner -->
	    <div class="mc-inner">

			@include('messages.success')
			
			<!-- Grid -->
			<div class="buttons-cont">
				<div class="col-2">
					<a class="default-button default-abutton red fl-left" href="{{ URL::route('research.create') }}">Add new research item</a>
				</div>
			</div>

			<div class="grid">
				<div class="grid-row">
			        <div class="widget red">
	                    <!-- Widget titlebar -->
	                    <div class="widget-titlebar">
	                        <span>Research</span>
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
											<th>Category</th>
											<th>Created by</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($research as $br => $item)
											<tr>
												<td>{{ ++$br }}</td>
												<td>{{ $item->title }}</td>
												<td class="td-description"><span class="description-table-list">{{ $item->description }}</span></td>
												<td>{{ ($item->research_category != null) ? $item->research_category->category : '/' }}</td>
												<td>{{ $item->creator->name }}</td>
												<td>{{ $item->created_at->format('d.m.Y') }}</td>
												<td>
													<a class="table-edit-icon" href="{{ URL::route('research.edit', $item->id) }}"></a>
													<a class="table-remove-icon" title="Delete research" href="javascript:;" onclick="confirmMsg('Delete research','Do you want to delete this research?','<?php echo URL::route('delete-research', $item->id) ?>')"></a>
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
