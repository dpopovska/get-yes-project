@extends('layouts/live-layout')

@section('live-content')

	<!-- MAINCONT -->
	<div class="maincont">
		<span class="section-title">ABOUT</span>
			
			<!-- About content wrapper -->
			<div class="about-content-wrapper">
				<div>
					<div class="formatting-container">
						<h3>PROJECT</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at magna tellus. Etiam luctus ligula auctor porta scelerisque. Aenean finibus efficitur libero id dapibus. In sit amet semper mi, sit amet dignissim ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec non hendrerit ex. Sed eu semper mi.n Mauris dignissim libero at nibh convallis facilisis. Nam fermentum elementum elementum. Phasellus volutpat velit eget velit vehicula, interdum ultrices odio tincidunt.<br /><br />Nam id congue ante. Donec ipsum nisi, lacinia sed ornare at, tincidunt id ipsum. Sed at urna placerat, tincidunt arcu quis, mollis neque. Phasellus condimentum enim a eros porta, ac imperdiet odio tempus. Praesent sit amet interdum lectus, eu luctus est. Nunc vestibulum convallis leo, tempus cursus eros pulvinar at. Nullam sed arcu tincidunt, mollis arcu sit amet, ultricies tortor. Curabitur feugiat posuere mauris in ullamcorper.</p>
						
						@foreach($categories as $id => $category)
							<h3>{{ strtoupper($category) }}</h3>

							<!-- Person tiles wrapper -->
							<div class="person-tiles-wrapper">

								@foreach($members as $member)
									@if(!is_null($member->about_category) && $member->about_category->id == $id)
										<!-- Single person tile -->
										<div class="person-tile">
											<div>
												<img src="{{ asset('upload/about/'.$member->image) }}" alt="">
												<span class="person-tile-name">{{ $member->name }}</span>
												<span class="person-tile-subtitle">{{ $member->title }}</span>
												<p>{{ $member->biography }}</p>
											</div>
										</div>
										<!-- Single person tile -->
									@endif
								@endforeach	
							</div>
							<!-- Person tiles wrapper -->
						@endforeach
					</div>
				</div>	
			</div>
			<!-- About content wrapper -->

		<div style="clear:both;"></div>
	</div>
	<!-- MAINCONT -->
		
@stop