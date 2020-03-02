<!-- Header region - Right -->
<div class="header-right">
	<!-- Notification buttons -->
	<div class="notification-buttons">
		<a href="#" title="New Syndicate Group"><span class="new-syndicate-icon active"></span><span class="notification-number">1</span></a>
	</div>
	<!-- Notification buttons -->
	
    @if (!Auth::guest())
		<!-- Logged profile -->
		<div class="logged-profile">
			<img class="profile-img" src="{{ asset('cmsstyle/images/online-person-image5.png') }}" alt="" />
			<span class="profile-name">{{ Auth::user()->name }}</span>
		</div>
		<!-- Logged profile -->
		<!-- Profile options dropdown -->
		<ul class="profile-options-dropdown">
			<li>
				<a class="po-dd-logout" href="{{ url('/logout') }}">Log Out</a>
			</li>
		</ul>
	@endif	
	
</div>
<!-- Header region - Right -->