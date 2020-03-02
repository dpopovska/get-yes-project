@extends('layouts/live-layout')

@section('live-content')

	<!-- MAINCONT -->
	<div class="maincont">
		<span class="section-title">RESEARCH</span>
			
			<!-- Research content wrapper -->
			<div class="research-content-wrapper">
				<div>
					<div class="formatting-container">

						<?php $info_text = ['Brochure' => 'One of the main activities of the project and a starting point was a research of the best practices for entrepreneurship programs, helping young people in the process of employment, in each partner’s country (Chile, Jamaica, Philippines, Germany and Macedonia). This research helped us understand the needs, problems and opportunities of the young unemployed people in different parts of the world, using that mixture in making a unique training course which can be shared with all of them.', 'Report' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at magna tellus. Etiam luctus ligula auctor porta scelerisque. Aenean finibus efficitur libero id dapibus. In sit amet semper mi, sit amet dignissim ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec non hendrerit ex. Sed eu semper mi.n Mauris dignissim libero at nibh convallis facilisis.'];?>

						@foreach($categories as $id => $category)
							<h3>PROJECT'S {{ strtoupper($category) }}</h3>
							<p>{{ $info_text[$category] }}</p>

							<!-- Research tiles wrapper -->
							<div class="research-tiles-wrapper">

								@foreach($all_items as $item)
									@if(!is_null($item->research_category) && $item->research_category->id == $id)
										<div class="research-{{strtolower($item->research_category->category)}}-tile">
											<div>
												<span>{{ strtoupper($item->title) }}</span>
												<p>{{ $item->description }}</p>
												<div>
													<span>{{ date('d M Y', strtotime($item->created_at)) }}</span>
													@if(File::extension('upload/research/'.$item->document) == 'pdf')
														<a target="_blank" href="{{ asset('upload/research/'.$item->document) }}">DOCUMENT PREVIEW</a>
													@else 
														<a target="_blank" href="{{ asset('upload/research/'.$item->document) }}">GET THE DOCUMENT</a>
													@endif
												</div>
											</div>
										</div>
									@endif
								@endforeach	
							</div>
							<!-- Research tiles wrapper -->
						@endforeach	

					</div>
				</div>	
			</div>
			<!-- Research content wrapper -->

		<div style="clear:both;"></div>
	</div>
	<!-- MAINCONT -->
		
@stop