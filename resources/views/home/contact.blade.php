@extends('layouts/live-layout')

@section('live-content')

    <!-- MAINCONT -->
    <div class="maincont">
        <span class="section-title">CONTACT</span>
            
            <!-- Contact content wrapper -->
            <div class="contact-content-wrapper">

                <!-- Contact content leftcol -->
                <div class="contact-content-leftcol">
                    <div class="formatting-container">

                        @include('messages.success')
                        
                        <h3>VIA EMAIL</h3>
                        <p>If you have any question regarding our project, or you just want to say Hello, feel free to contact us trought this email form and we promise that we will answer you back.</p>

                        {!! Form::open(array('url' => URL::to('contact'), 'method' => 'POST', 'id' => 'contact-form')) !!}
                            <div class="contact-form-group">
                                <span class="form-input-title">Your name</span>
                                {!! Form::text("full_name", (old("full_name") ? old("full_name") : "")) !!}
                                @if ($errors->has("full_name"))
                                     <span class="error-tooltip contact-error-tooltip">{{ $errors->first("full_name") }}</span>
                                @endif
                            </div>
                            <div class="contact-form-group">
                                <span class="form-input-title">Your email address</span>
                                {!! Form::text("email", (old("email") ? old("email") : "")) !!}
                                @if ($errors->has("email"))
                                     <span class="error-tooltip contact-error-tooltip">{{ $errors->first("email") }}</span>
                                @endif
                            </div>
                            <div class="contact-form-group">
                                <span class="form-input-title">Message</span>
                                {!! Form::textarea("message", (old("message") ? old("message") : "")) !!}
                                @if ($errors->has("message"))
                                     <span class="error-tooltip contact-area-error-tooltip">{{ $errors->first("message") }}</span>
                                @endif
                            </div>
                            {!! Form::button("SEND MESSAGE", ["type" => "submit", "class" => "send-message-btn"]) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
                <!-- Contact content leftcol -->

                <!-- Contact content rightcol -->
                <div class="contact-content-rightcol">
                    <div class="formatting-container">
                        <h3>VIA PHONE OR MAIL</h3>
                        <p>You can contact us trough our phone lines or by sending us an letter via regular mail.</p>
                        <div class="contact-brief-info">
                            <p class="cbi-address">Association of citizens CEFE Macedonia<br />Nikola Parapunov 33 / 57<br />1000, Skopje<br />Republic of Macedonia</p>
                            <p class="cbi-phone">+ 389 78 201 854</p>
                            <p class="cbi-email">info@cefe.mk</p>
                        </div>
                        <h3>SOCIAL NETWORKS</h3>
                        <ul class="contact-social-links">
                            <li><a href="javascript:;"><img src="{{ asset('images/contact-fb-icon.png') }}" alt="Get Yes Facebook"></a></li>
                            <li><a href="javascript:;"><img src="{{ asset('images/contact-twitter-icon.png') }}" alt="Get Yes Twitter"></a></li>
                            <li><a href="javascript:;"><img src="{{ asset('images/contact-youtube-icon.png') }}" alt="Get Yes Youtube"></a></li>
                            <li><a href="javascript:;"><img src="{{ asset('images/contact-instagram-icon.png') }}" alt="Get Yes Instagram"></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Contact content rightcol -->
            </div>
            <!-- Contact content wrapper -->

        <div style="clear:both;"></div>
    </div>
    <!-- MAINCONT -->

@stop    