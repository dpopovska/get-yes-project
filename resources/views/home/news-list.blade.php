@extends('layouts/live-layout')

@section('live-content')

	<script type="text/javascript">
		// $(document).ready(function() {
		// 	$(window).keydown(function(event){
		// 	    if(event.keyCode == 13) {
		// 	      event.preventDefault();
		// 	      return false;
		// 	    }
		// 	});
		// });
	</script>	

	<!-- MAINCONT -->
	<div class="maincont news-maincont">

		<!-- Leftcol -->
		<div class="main-leftcol">
			<span class="section-title">NEWS</span>
			<!-- News tiles wrapper -->
			<div class="news-tiles-wrapper">
				@foreach($all_news as $key => $item)
					<!-- News tile -->
					<div class="news-tile">
						<div>
	    					<img src="{{ asset('upload/news/'.$item->id.'/'.$item->thumbnail) }}" alt="{{ $item->title }}">
	    					<div class="news-tile-info">
	    						<span>{{ $item->title }}</span>
	    						<p>{!! substr(strip_tags(html_entity_decode($item->description)), 0, 250).'...' !!}</p>
	    						<div>
	    							<span>{{ date('d M Y', strtotime($item->created_at)) }}</span>
	                                <a href="{{ URL::to('single-news', $item->url_unique) }}">READ MORE</a>
	    						</div>
	    					</div>
	    				</div>
					</div>
					<!-- News tile -->
                @endforeach  
			</div>
			<!-- News tiles wrapper -->
			<div class="pagination-wrapper">
				{!! $all_news->render() !!}
			</div>
		</div>
		<!-- Leftcol -->

		<!-- Rightcol -->
		<div class="main-rightcol">
			<!-- Search widget -->
			<div class="search-widget">
				<span class="widget-title">SEARCH</span>
				{!! Form::open(['method'=>'GET', 'url'=> URL::to('news-list')])  !!}
					<div class="search-widget-formgroup">
						{!! Form::text('searchword', null, ['placeholder'=>'Search news']) !!}
						@if ($errors->has("searchword"))
                            <span class="error-tooltip contact-error-tooltip">{{ $errors->first("searchword") }}</span>
                        @endif
						{!! Form::button(null, ['type' => 'submit']) !!}
					</div>
				{!! Form::close() !!}
			</div>
			<!-- Search widget -->
			<!-- News archive widget -->
			<div class="news-archive-widget">
				<!-- News archive widget titlebar -->
				<div class="naw-title">
					<span class="widget-title">ARCHIVE</span>
					<div class="naw-select-field">
						<select id="year-news-dropdown">
							@foreach($years as $year)
								<option @if((!isset($active_year) && $year == date("Y")) || (!is_null($active_year) && $active_year == $year)) selected @endif>{{ $year }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<!-- News archive widget titlebar -->

				<!-- LI class = ACTIVE pri selektiranje na mesec -->
				<!-- News archive calendar -->
				<ul class="naw-calendar">
					@foreach($months as $key => $month)
						<?php ++$key; ?>
						<li class="@if(!array_key_exists($key, $archive)) empty @elseif(!is_null($active_month) && $key == $active_month) active @endif">
							<a href="javascript:;" data-vali="{{ $key }}">
								<span class="naw-calendar-month">{{ $month }}</span>
								<span class="naw-posts-number">{{ array_key_exists($key, $archive) ? $archive[$key] : 0 }}</span>
							</a>
						</li>
					@endforeach
				</ul>
				<!-- News archive calendar -->
			</div>
			<!-- News archive widget -->
		</div>
		<!-- Rightcol -->

		<div style="clear:both;"></div>
	</div>
	<!-- MAINCONT -->
	
	<script type="text/javascript">
	$(document).ready(function(){
		$(".naw-calendar li a").on("click", function(){
			
			if($(this).find(".naw-posts-number").text() === "0") return false;

			var selected_year = $("#year-news-dropdown").val();
			var selected_month = $(this).attr("data-vali");
			var index_route = "<?php echo URL::to('/') ?>";
			window.location.href = index_route+"/news-list/"+selected_year+"/"+selected_month;
		});

		$("#year-news-dropdown").on("change", function(){
			var selected_year = $(this).val();
			var index_route = "<?php echo URL::to('/') ?>";
			window.location.href = index_route+"/news-list/"+selected_year;
		});
	});
	</script>
@stop