<!DOCTYPE HTML>
<!--[if IE 9 ]>    <html lang="en" id="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="UTF-8" />
        <title>GetYes | Global Exchange and Training for Youth Employment Services</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <meta name="robots" content="index, follow, noarchive"/>
        <meta name="googlebot" content="noarchive"/>
        <meta name="csrf-token" content="<?php echo csrf_token() ?>">

        <!-- FACEBOOK share meta tags -->
        <meta property="og:url"           content="{{ isset($single_news) ? URL::to('single-news',$single_news->url_unique) : '' }}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="{{ isset($single_news) ? $single_news->title : '' }}" />
        <meta property="og:description"   content="{{ isset($single_news) ? substr(strip_tags(html_entity_decode($single_news->description)), 0, 200).'...' : ''}}" />
        <meta property="og:image"         content="{{ isset($single_news) ? asset('upload/news/'.$single_news->id.'/'.$single_news->image) : '' }}" />
        <!-- FACEBOOK share meta tags -->

        <!-- TWITTER share meta tags -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:url" content="{{ isset($single_news) ? URL::to('single-news',$single_news->url_unique) : '' }}">
        <meta name="twitter:title" content="{{ isset($single_news) ? $single_news->title : '' }}">
        <meta name="twitter:description" content="{{ isset($single_news) ? substr(strip_tags(html_entity_decode($single_news->description)), 0, 100).'...' : ''}}">
        <meta name="twitter:image" content="{{ isset($single_news) ? asset('upload/news/'.$single_news->id.'/'.$single_news->image) : '' }}">
        <!-- TWITTER share meta tags -->

		<!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/global.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" />
		<!-- CSS -->

		<!--jQuery-->
        <script type="text/javascript" src="{{ asset('js/jquery-1.12.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>
		<!--jQuery-->

	</head>

	<body>
        <!-- HEADER -->
        <div class="header">
            <div>
                <a href="{{ URL::to('/') }}"><img src="{{ asset('images/logo.png') }}" alt="Get Yes"><span>GLOBAL EXCHANGE AND TRAINING<br />FOR YOUTH EMPLOYEMENT SERVICES</span></a>
                <div class="header-actions">
                    <a class="open-nav-link" href="javascript:;"></a>
                    <ul>
                        <li><a class="{{ (isset($home)) ? $home : '' }}" href="{{ URL::to('/') }}">HOME</a></li>
                        <li><a class="{{ (isset($about)) ? $about : '' }}" href="{{ URL::to('about-page') }}">ABOUT</a></li>
                        <li><a class="{{ (isset($research)) ? $research : '' }}" href="{{ URL::to('research-list') }}">RESEARCH</a></li>
                        <li><a class="{{ (isset($materials)) ? $materials : '' }}" href="{{ URL::to('materials-list') }}">MATERIALS</a></li>
                        <li><a class="{{ (isset($news)) ? $news : '' }}" href="{{ URL::to('news-list') }}">NEWS</a></li>
                        <li><a class="{{ (isset($contact)) ? $contact : '' }}" href="{{ URL::to('contact') }}">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- HEADER -->

        @yield('live-content')

        <!-- FOOTER -->
        <div class="footer">
            <div>
                <!-- Footer navigation -->
                <div class="footer-navigation">
                    <ul>
                        <li><a href="{{ URL::to('about-page') }}">About</a></li>
                        <li><a href="{{ URL::to('research-list') }}">Research</a></li>
                        <li><a href="{{ URL::to('materials-list') }}">Materials</a></li>
                    </ul>
                    <ul>
                        <li><a href="{{ URL::to('news-list') }}">News</a></li>
                        <li><a href="{{ URL::to('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <!-- Footer navigation -->
                <!-- Footer subscribe -->
                <div class="footer-subscribe">
                    <span>Subscribe</span>
                    <p>Insert your email address to subscribe to our newsletter, and receive latest information in your inbox.</p>

                    {!! Form::open(array('url' => URL::to('subscription', 'footer'), 'method' => 'POST', 'id' => 'subscription-form')) !!}
                        <div class="footer-subscribe-formgroup">
                            <input type="text" name="footer_email" value="" placeholder="@if(Session::has('footer_success')){{ Session::get('footer_success') }}@else YOUR EMAIL ADDRESS @endif" onfocus="{this.placeholder=''}" onblur="{this.placeholder='YOUR EMAIL ADDRESS'}"/>
                            @if ($errors->has('footer_email'))
                                 <span class="error-tooltip footer-error-tooltip">{{ $errors->first('footer_email') }}</span>
                            @endif
                            {!! Form::button('SUBSCRIBE', ['type' => 'submit']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                <!-- Footer subscribe -->
                <!-- Footer social links -->
                <div class="footer-social-links">
                    <ul>
                        <li><a class="fsl-fb" href="javascript:;" target="_blank"></a></li>
                        <li><a class="fsl-twitter" href="javascript:;" target="_blank"></a></li>
                        <li><a class="fsl-insta" href="javascript:;" target="_blank"></a></li>
                        <li><a class="fsl-yt" href="javascript:;" target="_blank"></a></li>
                    </ul>
                    <span>{{ date('Y') }} &copy; GET YES. All rights reserved.</span>
                </div>
                <!-- Footer social links -->
                <div style="clear:both;"></div>
            </div>
        </div>

        <!--jQuery-->
        <script type="text/javascript" src="{{ asset('js/global-live-page.js') }}"></script>
        <script type="text/javascript">
            <!--Navigate down to footer when there are subscription error/success messages-->
            $(document).ready(function(){
                var session = '<?php echo Session::get("footer_success"); ?>';
                var errors = '<?php echo $errors->first("footer_email"); ?>';
                
                if(session.length > 0 || errors != "")
                {
                    $('html, body').animate({
                        scrollTop: $(".footer").offset().top
                    }, 1000);
                }
            });
        </script>
		<!--jQuery-->

    </body>
</html>