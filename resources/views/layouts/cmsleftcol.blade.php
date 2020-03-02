<!--Lefcol menu script -->
<script type="text/javascript">
    $(document).ready(function() {

        $('.navigation-link').click(function(e){
            //e.preventDefault();
            $(this).parent().find('.navigation-dropdown-cont').stop().slideToggle(function(){
                equalizeLeftRightCol(); 
            });
            $(this).parent().find('.navigation-dropdown-cont').toggleClass('active');   
        });

        var block = "<?php if(isset($submenu)){ echo $submenu; } else{ echo Request::segment(2);} ?>";
        var page = "<?php if(isset($mainmenu)){ echo $mainmenu; } else { echo Request::segment(1);} ?>";

        /* Add active class on main cateogory */ 
        if(page !== "")
           $("."+page).addClass("active");
        /* Add active class on dropdown */

        /* Add class to subcategory */
        if(block !== ""){
        $("."+block).parents('ul').slideDown();
        if(page !== "")
            $("."+page).next().show().addClass("active");
        $("a."+block).addClass("active");
        }

    }); 
</script>
<!--Lefcol menu script-->

<!-- LEFT SIDEBAR -->
<div class="left-sidebar">
    <!-- left sidebar logo -->
    <div class="ls-logo">
        <img src="{{ asset('cmsstyle/images/image-logo.png') }}" alt="eIndex">
    </div>
    <!-- left sidebar logo -->

    <!-- left sidebar user tile -->
    <div class="ls-user-tile">
        <img src="{{ asset('cmsstyle/images/image-user-main.png') }}" alt="">
        <div class="ls-ut-name-actions">
            <span>{{ Auth::user()->name }}</span>
            <ul>
                <li>
                    <a class="ls-notify-action active transition-fast" href="javascript:;"></a>  
                </li>
                <li>
                    <a class="ls-settings-action transition-fast" href="javascript:;"></a>
                </li>
                <li>
                    <a class="ls-logout-action transition-fast" title="Log Out" href="{{ URL::to('logout') }}"></a>
                </li>
            </ul>
        </div>
        <!-- notifications dropdown -->
        <div class="ls-notifications-dropdown">
            <div class="ls-nd-title">
                <span>Notifications</span>
            </div>
            <ul class="ls-nd-tiles">
                <!-- No notifications tile -->
                <li class="no-notifications">
                    <span>There aren't new notifications.</span>
                </li>
                <!-- No notifications tile -->
                <li>
                    <img src="images/kate-dijana.png" alt="">
                    <span>Катерина Вебмахер постави прашање.</span>
                    <p>24.03.2015 во 13:30</p>
                </li>
                <li>
                    <img src="images/kate-dijana.png" alt="">
                    <span>Катерина Вебмахер постави прашање.</span>
                    <p>24.03.2015 во 13:30</p>
                </li>
            </ul>
            <a class="ls-nd-all-notifications" href="javascript:;">See all notifications</a>
        </div>
    </div>
    <!-- left sidebar user tile -->

    <!-- left sidebar navigation -->
    <div class="ls-navigation red">
        <div class="ls-navigation-inner">
            <ul>
                @can('isAdmin', App\Roles::class)
                    <li>
                        <a class="ls-nav-professors users" href="javascript:;">Users</a>
                        <ul class="ls-nav-dropdown">
                            <li>
                                <a class="do-link list-users" href="{{ URL::route('users.index') }}">List of all users</a>
                            </li>
                            <li>
                                <a class="" href="#">Admins</a>
                            </li>
                        </ul>
                    </li>
                
                    <li>
                        <a class="ls-nav-administration block-live-pages" href="javascript:;">Live Pages</a>
                        <!-- left sidebar navigation dropdown -->
                        <ul class="ls-nav-dropdown">
                            <li><a class="do-link partners" href="{{ URL::to('/partners') }}">Partners</a></li>
                            <li><a class="do-link about-page" href="{{ URL::to('/about') }}">About page</a></li>
                            <li><a class="do-link materials" href="{{ URL::to('/materials') }}">Materials</a></li>
                            <li><a class="do-link research" href="{{ URL::to('/research') }}">Research</a></li>
                            <li><a class="do-link news" href="{{ URL::to('/news') }}">News</a></li>
                            <li><a class="do-link subscriptions" href="{{ URL::to('/subscriptions') }}">Subscriptions</a></li>
                        </ul>
                        <!-- left sidebar navigation dropdown -->
                    </li>
                @endcan
            </ul>
        </div>
    </div>
    <!-- left sidebar navigation -->
</div>
<!-- LEFT SIDEBAR -->