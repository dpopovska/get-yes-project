@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	@include('layouts.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">News</span>
		</div>

	    <!-- main content inner -->
	    <div class="mc-inner">

			@include('messages.success')
			
			<!-- Grid -->
			<div class="buttons-cont">
				<div class="col-2">
					<a class="default-button default-abutton red fl-left" href="{{ URL::route('news.create') }}">Add news item</a>
				</div>
			</div>

			<div class="grid">
				<div class="grid-row">
			        <div class="widget red">
	                    <!-- Widget titlebar -->
	                    <div class="widget-titlebar">
	                        <span>News</span>
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
										@foreach($news as $br => $singlenews)
											<tr>
												<td>{{ ++$br }}</td>
												<td>{{ $singlenews->title }}</td>
												<td class="td-description"><span class="description-table-list">{{ strip_tags(html_entity_decode($singlenews->description)) }}</span></td>
												<td>{{ $singlenews->creator->name }}</td>
												<td>{{ $singlenews->created_at->format('d.m.Y') }}</td>
												<td>
													<a class="table-edit-icon" href="{{ URL::route('news.edit', $singlenews->id) }}"></a>
													<a class="table-remove-icon" title="Delete news" href="javascript:;" onclick="confirmMsg('Delete news','Do you want to delete these news?','<?php echo URL::route('delete-news', $singlenews->id) ?>')"></a>
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
