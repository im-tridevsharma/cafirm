@php 
$menus = \App\Models\Menu::where("status", 1)->where("parent_id", 0)->orderBy("sort_order", "asc")->where("position", "top")->get();
@endphp

<!--====== HEADER-AREA PART START ======-->

<header class="header-area header-3-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-top d-flex justify-content-between">
                    <div class="header-top-info d-none d-md-block">
                        <ul>
                            <li><a href="tel:{{ _config('mobile') }}"><i class="fa fa-phone"></i> {{ _config('mobile') }}</a></li>
                            <li><a href="mailto:{{ _config('email') }}"><i class="fa fa-envelope"></i> {{ _config('email') }}</a></li>
                        </ul>
                    </div>
                    <div class="login-action">
                        <a href="/login">Login</a>
                    </div>
                    <div class="header-top-social">
                        <select>
                            <option value="1">English</option>
                            <option value="2">Bangla</option>
                            <option value="3">Hindi</option>
                            <option value="4">Spanish</option>
                        </select>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="navigation">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ _config('site_logo') }}" alt="cafirm_logo" style="height: 80px; object-fit:contain;">
                        </a> <!-- logo -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFive" aria-controls="navbarFive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button> <!-- navbar toggler -->
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarFive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="page-scroll" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="{{ route('about-us') }}">About Us </a>
                                </li>
                                @if($menus && count($menus) > 0)
                                @foreach($menus as $menu)
                                <li class="nav-item">
                                    <a class="page-scroll" href="{{ !has_child_menu($menu->id) ? ($menu->redirect !== '' ? $menu->redirect : $menu->slug) : '#' }}">{{ $menu->title ?? ''}} @if(has_child_menu($menu->id)) <span>+</span>  @endif</a>
                                    @php $childs = get_child_menus($menu->id); @endphp

                                    @if($childs && count($childs) > 0)
                                    <ul class="sub-menu">
                                        @foreach($childs as $child)
                                        <li><a href="{{ !empty($child->redirect) ? $child->redirect : $child->slug }}">{{ $child->title ?? '' }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div>
        </div>
    </div>
</header>

<!--====== HEADER-AREA PART ENDS ======-->