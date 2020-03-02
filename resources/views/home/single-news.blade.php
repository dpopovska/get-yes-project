@extends('layouts/live-layout')

@section('live-content')

	<!-- MAINCONT -->
	<div class="maincont news-maincont">

		<!-- Leftcol -->
		<div class="main-leftcol">
			<!-- Single news article wrapper -->
			<div class="news-article-content">
				<!-- News article heading image -->
				<div class="nac-heading-image">
					<img src="{{ asset('upload/news/'.$single_news->id.'/'.$single_news->image) }}" alt="{{ $single_news->title }}">
				</div>
				<!-- News article heading image -->
				<!-- News article text container -->
				<div class="nac-text-container">
					<div class="news-article-title">
						<span>{{ $single_news->title }}</span>
						<p><span>POSTED ON</span> {{ date('d M Y', strtotime($single_news->created_at)) }} <span>by</span> {{ $single_news->creator->name }}</p>
						<!-- Single news share buttons -->
						<div class="nac-share-buttons">
							{{-- <a class="fb-xfbml-parse-ignore nac-fb-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"></a> --}}

							<a class="nac-fb-share" target="_blank" href="http://www.facebook.com/dialog/feed?app_id=1822585007959662&link={{ URL::to('single-news',$single_news->url_unique) }}&display=popup&redirect_uri={{ URL::to('single-news',$single_news->url_unique) }}">

				            <a target="_blank" class="nac-twitter-share" href="https://twitter.com/share?url={{ URL::to('single-news',$single_news->url_unique) }}" data-show-count="false"></a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

						</div>
						<!-- Single news share buttons -->
					</div>
					<div class="text-formatting">
						{!! html_entity_decode($single_news->description) !!}
					</div>
				</div>
				<!-- News article text container -->
			</div>
			<!-- Single news article wrapper -->
		</div>
		<!-- Leftcol -->

		<!-- Rightcol -->
		<div class="main-rightcol ns-main-rightcol">
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