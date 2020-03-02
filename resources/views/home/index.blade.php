@extends('layouts/live-layout')

@section('live-content')

    <!-- HOME TOP SECTION -->
    <div class="home-top-section">
        <div>
            <h1>SUBSCRIBE AND GET YES</h1>
            <h2>Be in track with our latest research events and materials. Get notifications directly to your inbox.</h2>

             {!! Form::open(array('url' => URL::to('subscription', 'header'), 'method' => 'POST', 'id' => 'subscription-form')) !!}
                <div class="form-group">
                    <input type="text" name="email" value="" placeholder="@if(Session::has('success')){{ Session::get('success') }}@else YOUR EMAIL ADDRESS @endif" onfocus="{this.placeholder=''}" onblur="{this.placeholder='YOUR EMAIL ADDRESS'}"/>
                    @if ($errors->has('email'))
                         <span class="error-tooltip">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                {!! Form::button('SUBSCRIBE', ['type' => 'submit']) !!}
             {!! Form::close() !!}

        </div>
        <a class="hts-scroll-down" href="javascript:;"></a>
    </div>
    <!-- HOME TOP SECTION -->

    <!-- RECENT NEWS SECTION -->
    <div class="recent-news-section" id="recent-news-section">
        <div>
            <span class="home-section-title">RECENT NEWS</span>
            <!-- Recent news wrapper -->
            <div class="recent-news-wrapper">
            
                @foreach($last_news as $key => $item)
                    <!-- Recent news single block -->
                    <div class="recent-news-block">
                        <div>
                            <img src="{{ asset('upload/news/'.$item->id.'/'.$item->thumbnail) }}" alt="{{ $item->title }}">
                            <div class="rnb-info-cont">
                                <span>{{ $item->title }}</span>
                                <p>{!! substr(strip_tags(html_entity_decode($item->description)), 0, 150).'...' !!}</p>
                                <div>
                                    <span>{{ date('d M Y', strtotime($item->created_at)) }}</span>
                                    <a href="{{ URL::to('single-news', $item->url_unique) }}">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Recent news single block -->
                @endforeach  
            </div>

            <!-- Recent news wrapper -->
            <div style="clear:both;"></div>

            @if($last_news->count() > 0)
                <a class="read-all-news-btn" href="{{ URL::to('news-list') }}">Read all news</a>
            @endif
        </div>
        
    </div>
    <!-- RECENT NEWS SECTION -->

    <script type="text/javascript">
        $(function(){
            $('.click').on("click", function(){
                $('.testclass').addClass('shrink');
            });
        });
    </script>
    <!-- HOME INFO SECTION -->
    <div class="home-info-section">
        <div>
            <div class="his-text-content">
                <div class="his-tabs-wrapper his-tabs-style">
                    <ul class="his-tabs">
                        <li class="his-tab his-tab-current" id="index-project-desc"><a href="#" class="his-tab-link">Project</a></li>
                        <li class="his-tab" id="index-research-desc"><a href="#" class="his-tab-link">Research</a></li>
                        <li class="his-tab" id="index-materials-desc"><a href="#" class="his-tab-link">Materials</a></li>
                    </ul>
                </div>
                <div class="his-text-paragraph index-project-desc">
                    <p>Nunc tempor augue eget egestas facilisis. Fusce enim neque, condimentum sit amet ultrices at, rhoncus a elit. Mauris mattis elementum rhoncus.<br />Maecenas ut rutrum metus. Vestibulum lacinia tortor lectus, ac mattis risus varius in. Aenean vitae eros a libero vehicula rutrum a id neque. Mauris finibus lobortis arcu, a consequat erat varius in. Aenean vehicula sem a dui tincidunt suscipit.<br/>Cras sollicitudin felis feugiat lacus iaculis, quis elem entum ante egestas. Phasellus sodales lorem sit amet finibus ultrices. PROJECT</p>
                    <a class="click" href="javascript:;">READ MORE</a>
                </div>
                <div class="his-text-paragraph index-research-desc hide-desc">
                    <p>Nunc tempor augue eget egestas facilisis. Fusce enim neque, condimentum sit amet ultrices at, rhoncus a elit. Mauris mattis elementum rhoncus.<br />Maecenas ut rutrum metus. Vestibulum lacinia tortor lectus, ac mattis risus varius in. Aenean vitae eros a libero vehicula rutrum a id neque. Mauris finibus lobortis arcu, a consequat erat varius in. Aenean vehicula sem a dui tincidunt suscipit.<br/>Cras sollicitudin felis feugiat lacus iaculis, quis elem entum ante egestas. Phasellus sodales lorem sit amet finibus ultrices. RESEARCH</p>
                    <a class="click" href="{{ URL::to('research-list') }}">READ MORE</a>
                </div>
                <div class="his-text-paragraph index-materials-desc hide-desc">
                    <p>Nunc tempor augue eget egestas facilisis. Fusce enim neque, condimentum sit amet ultrices at, rhoncus a elit. Mauris mattis elementum rhoncus.<br />Maecenas ut rutrum metus. Vestibulum lacinia tortor lectus, ac mattis risus varius in. Aenean vitae eros a libero vehicula rutrum a id neque. Mauris finibus lobortis arcu, a consequat erat varius in. Aenean vehicula sem a dui tincidunt suscipit.<br/>Cras sollicitudin felis feugiat lacus iaculis, quis elem entum ante egestas. Phasellus sodales lorem sit amet finibus ultrices. MATERIALS</p>
                    <a class="click" href="{{ URL::to('materials-list') }}">READ MORE</a>
                </div>
            </div>
            <div class="his-image">
                <div class="testclass">
                    <img src="{{ asset('images/home-info-image.png') }}" alt="Get Yes info">
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <!-- HOME INFO SECTION -->

    <!-- OUR PARTNERS SECTION -->
    <div class="our-partners-section">
        <div>
            <span class="home-section-title">OUR PARTNERS</span>
            <ul class="our-partners-logos">
                @foreach($partners as $partner)
                    <li><a href="{{ $partner->link }}" target="_blank"><img src="{{ asset('upload/partners/'.$partner->image) }}"></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- OUR PARTNERS SECTION -->

@stop    