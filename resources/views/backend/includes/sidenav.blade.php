<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="/admin/dashboard" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="/assets/img/logo-small.png">
            </div>
            <!-- <p>CT</p> -->
        </a>
        <a href="/admin/dashboard" class="simple-text logo-normal">
            CAFirm
            <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
    </div>
    <p>Dashboard</p>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }} ">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.banners.all', 'admin.banners.add','admin.banners.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.banners.all', 'admin.banners.add','admin.banners.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#webiteDropdown" aria-expanded="false">
                    <i class="nc-icon nc-image"></i>
                    <p> Banners
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.banners.all', 'admin.banners.add','admin.banners.edit']) ? 'show' : '' }}" id="webiteDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.banners.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.banners.all') }}">
                                <span class="sidebar-normal"> All Banners </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.banners.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.banners.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.categories.all', 'admin.categories.add','admin.categories.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.categories.all', 'admin.categories.add','admin.categories.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#categoryDropdown" aria-expanded="false">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p> Categories
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.categories.all', 'admin.categories.add','admin.categories.edit']) ? 'show' : '' }}" id="categoryDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.categories.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.categories.all') }}">
                                <span class="sidebar-normal"> All categories </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.categories.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.categories.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.business_categories.all', 'admin.business_categories.add','admin.business_categories.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.business_categories.all', 'admin.business_categories.add','admin.business_categories.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#bcategoryDropdown" aria-expanded="false">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p> Business Categories
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.business_categories.all', 'admin.business_categories.add','admin.business_categories.edit']) ? 'show' : '' }}" id="bcategoryDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.business_categories.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.business_categories.all') }}">
                                <span class="sidebar-normal"> All business cat.. </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.business_categories.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.business_categories.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.memberships.all', 'admin.memberships.add','admin.memberships.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.memberships.all', 'admin.memberships.add','admin.memberships.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#membershipDropdown" aria-expanded="false">
                    <i class="nc-icon nc-paper"></i>
                    <p> Plans
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.memberships.all', 'admin.memberships.add','admin.memberships.edit']) ? 'show' : '' }}" id="membershipDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.memberships.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.memberships.all') }}">
                                <span class="sidebar-normal"> All Plans </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.memberships.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.memberships.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.pages.all', 'admin.pages.add','admin.pages.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.pages.all', 'admin.pages.add','admin.pages.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#pageDropdown" aria-expanded="false">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p> Pages
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.pages.all', 'admin.pages.add','admin.pages.edit']) ? 'show' : '' }}" id="pageDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.pages.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pages.all') }}">
                                <span class="sidebar-normal"> All pages </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.pages.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.pages.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.blogs.all', 'admin.blogs.add','admin.blogs.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.blogs.all', 'admin.blogs.add','admin.blogs.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#blogDropdown" aria-expanded="false">
                    <i class="nc-icon nc-ruler-pencil"></i>
                    <p> Blogs
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.blogs.all', 'admin.blogs.add','admin.blogs.edit']) ? 'show' : '' }}" id="blogDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.blogs.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.blogs.all') }}">
                                <span class="sidebar-normal"> All blogs </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.blogs.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.blogs.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.menus.all', 'admin.menus.add','admin.menus.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.menus.all', 'admin.menus.add','admin.menus.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#menusDropdown" aria-expanded="false">
                    <i class="nc-icon nc-align-left-2"></i>
                    <p> Menus
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.menus.all', 'admin.menus.add','admin.menus.edit']) ? 'show' : '' }}" id="menusDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.menus.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.menus.all') }}">
                                <span class="sidebar-normal"> All menus </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.menus.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.menus.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.testimonials.all', 'admin.testimonials.add','admin.testimonials.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.testimonials.all', 'admin.testimonials.add','admin.testimonials.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#testimonialDropdown" aria-expanded="false">
                    <i class="nc-icon nc-circle-10"></i>
                    <p> Testimonials
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.testimonials.all', 'admin.testimonials.add','admin.testimonials.edit']) ? 'show' : '' }}" id="testimonialDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.testimonials.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.testimonials.all') }}">
                                <span class="sidebar-normal"> All testimonials </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.testimonials.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.testimonials.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.teams.all', 'admin.teams.add','admin.teams.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.teams.all', 'admin.teams.add','admin.teams.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#teamsDropdown" aria-expanded="false">
                    <i class="nc-icon nc-single-02"></i>
                    <p> Teams
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.teams.all', 'admin.teams.add','admin.teams.edit']) ? 'show' : '' }}" id="teamsDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.teams.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.teams.all') }}">
                                <span class="sidebar-normal"> All teams </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.teams.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.teams.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.bookings']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.bookings') }}">
                    <i class="nc-icon nc-credit-card"></i>
                    <p> Bookings </p>
                </a>
            </li>
            

            @if(false)
            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.reviews.all', 'admin.reviews.add','admin.reviews.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.reviews.all', 'admin.reviews.add','admin.reviews.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#reviewsDropdown" aria-expanded="false">
                    <i class="nc-icon nc-favourite-28"></i>
                    <p> Reviews
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.reviews.all', 'admin.reviews.add','admin.reviews.edit']) ? 'show' : '' }}" id="reviewsDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.reviews.all' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.reviews.all') }}">
                                <span class="sidebar-normal"> All reviews </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.reviews.add' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.reviews.add') }}">
                                <span class="sidebar-normal"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.reviews.all', 'admin.reviews.add','admin.reviews.edit']) ? 'active' : '' }}">
                <a class="nav-link {{ in_array(Route::currentRouteName(), ['admin.reviews.all', 'admin.reviews.add','admin.reviews.edit']) ? '' : 'collapsed' }}" data-toggle="collapse" href="#settingsDropdown" aria-expanded="false">
                    <i class="nc-icon nc-settings-gear-65"></i>
                    <p> Settings
                        <b class="caret mt-2"></b>
                    </p>
                </a>
                <div class="collapse {{ in_array(Route::currentRouteName(), ['admin.settings.general', 'admin.settings.contact','admin.settings.social']) ? 'show' : '' }}" id="settingsDropdown">
                    <ul class="nav pl-3">
                        <li class="nav-item {{ Route::currentRouteName() === 'admin.settings.general' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.settings.general') }}">
                                <span class="sidebar-normal"> General </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>