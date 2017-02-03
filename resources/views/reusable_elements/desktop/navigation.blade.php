<div class="site-menubar">
    <div class="site-menubar-header cover">
        <div class="cover-background vertical-align" style="background-image: url('{{ asset('/assets/images/menubar-header.jpg') }}')">
            <div class="vertical-align-middle">
                <a class="avatar avatar-lg" href="javascript:void(0)">
                    <img src="{{ empty(session('avatar')) ? '//s1.rui.au.reastatic.net/rui-static/img/default-profile-image.jpg' : session('avatar') }}" alt="Machi">
                </a>
                <div class="site-menubar-info">
                    <h5 class="site-menubar-user">{{ session('name') }}</h5>
                    <p class="site-menubar-email">{{ session('office') }}</p>
                    <p class="site-menubar-email">{{ session('email') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-item {{ $active_menu_item=='dashboard'?'active':null }}">
                        <a class="animsition-link" href="{{ url('dashboard') }}">
                            <i class="site-menu-icon fa-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.dashboard') }}</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub {{ $active_menu_item=='properties'?'active open':null }}">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon fa-home" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.properties') }}</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            @if(session('show_add_property_menu')==1)
                            <li class="site-menu-item">
                                <a class="animsition-link {{ $user_agent_detector->isMobile()?'hidden':null }}" href="{{ url('properties/add') }}">
                                    <span class="site-menu-title">{{ trans('navigation.add_new') }}</span>
                                </a>
                            </li>
                            @endif
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('properties/my_listings') }}">
                                    <span class="site-menu-title">{{ trans('navigation.my_listings') }}</span>
                                </a>
                            </li>
                            @if(session('show_sale')==1)
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('properties/listings_for_sale') }}">
                                    <span class="site-menu-title">{{ trans('navigation.listing_for_sale') }}</span>
                                </a>
                            </li>
                            @endif
                            @if(session('show_rent')==1)
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('properties/listings_for_rent') }}">
                                    <span class="site-menu-title">{{ trans('navigation.listing_for_rent') }}</span>
                                </a>
                            </li>
                            @endif
                            @if(session('show_sold')==1)
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('properties/my_sales_history') }}">
                                    @if(session('agent_role')=='1')
                                        <span class="site-menu-title">{{ trans('navigation.my_sales_history') }}</span>
                                    @else
                                        <span class="site-menu-title">{{ trans('navigation.my_rental_history') }}</span>
                                    @endif
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a class="animsition-link" href="{{ session('agent_profile_url') }}" target="_blank">
                            <i class="site-menu-icon fa-external-link" aria-hidden="true"></i>
                            <span class="site-menu-title">My Profile</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub {{ $active_menu_item=='customers'?'active open':null }}">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon fa-user" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.people') }}</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('configs/categories') }}">
                                    <span class="site-menu-title">{{ trans('navigation.categories') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('customers/all_my_people') }}">
                                    <span class="site-menu-title">{{ trans('navigation.all_my_people') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('customers/buyers') }}">
                                    @if(session('agent_role')=='1')
                                        <span class="site-menu-title">{{ trans('navigation.buyers') }}</span>
                                    @else
                                        <span class="site-menu-title">{{ trans('navigation.tenants') }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('customers/potential_sellers') }}">
                                    <span class="site-menu-title">{{ trans('navigation.potential_sellers') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('customers/purchasers') }}">
                                    <span class="site-menu-title">{{ trans('navigation.purchasers') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub {{ $active_menu_item=='appraisals'?'active':null }}">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-comment-alt-text" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.appraisals') }}</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('appraisals/new') }}">
                                    <span class="site-menu-title">{{ trans('navigation.new_appraisal') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('appraisals/list') }}">
                                    <span class="site-menu-title">{{ trans('navigation.appraisal_list') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub {{ $active_menu_item=='agent_toolkit'?'active':null }} {{ ($user_agent_detector->isMobile() && !session('show_appraisal_toolkit'))?'hidden':null }}">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-widgets" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.agent_toolkit') }}</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('buyers/available') }}">
                                    <span class="site-menu-title">{{ trans('navigation.available_buyers') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('sales/history_search') }}">
                                    <span class="site-menu-title">{{ trans('navigation.sales_history_search') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('appraisals/send_my_profile') }}">
                                    <span class="site-menu-title">{{ trans('navigation.send_my_profile') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="site-menu-item {{ $active_menu_item=='tasks'?'active':null }} {{ ($user_agent_detector->isMobile() && !session('show_todos'))?'hidden':null }}">
                        <a class="animsition-link" href="{{ url('tasks/list') }}">
                            <i class="site-menu-icon fa-tasks" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.tasks') }}</span>
                        </a>
                    </li>

                    <li class="site-menu-item {{ $active_menu_item=='our_staff'?'active':null }} {{ ($user_agent_detector->isMobile() && !session('show_our_staff'))?'hidden':null }}">
                        <a class="animsition-link" href="{{ url('users/our_staff') }}">
                            <i class="site-menu-icon fa-camera-retro" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.our_staff') }}</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub {{ $active_menu_item=='configs'?'active open':null }}">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon fa-cogs" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.settings') }}</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('configs/frequent_text') }}">
                                    <span class="site-menu-title">{{ trans('navigation.f_text') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('configs/setting') }}">
                                    <span class="site-menu-title">{{ trans('navigation.config') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('pending') }}">
                                    <span class="site-menu-title">{{ trans('navigation.Import_sales_history') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('pending') }}">
                                    <span class="site-menu-title">{{ trans('navigation.Import_current_listing') }}</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ url('/import/current_buyers') }}">
                                    <span class="site-menu-title">{{ trans('navigation.Import_sales_buyers') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub {{ $active_menu_item=='socials'?'active open':null }} {{ $user_agent_detector->isMobile()?'hidden':null }}">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon icon md-share" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.Socials') }}</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="" style="font-size: 22px;">
                                    <i class="icon md-facebook-box" aria-hidden="true"></i>&nbsp;
                                    <i class="icon md-twitter-box" aria-hidden="true"></i>&nbsp;
                                    <i class="icon md-instagram" aria-hidden="true"></i>&nbsp;
                                    <i class="icon md-linkedin-box" aria-hidden="true"></i>&nbsp;
                                    <i class="icon fa-wechat" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a class="animsition-link" href="{{ url('logout') }}">
                            <i class="site-menu-icon fa-sign-out" aria-hidden="true"></i>
                            <span class="site-menu-title">{{ trans('navigation.logout') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>