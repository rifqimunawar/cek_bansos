@php
    $appSidebarTransparent = $appSidebarTransparent ?? false;
    $appSidebarLight = $appSidebarLight ?? false;
    $appSidebarClass = !empty($appSidebarTransparent) ? 'app-sidebar-transparent' : '';
    $appSidebarAttr = !empty($appSidebarLight) ? '' : ' data-bs-theme=dark';

    $menus = App\Helpers\Sidebar::getMenu();
    $currentUrl = Request::path() != '/' ? '/' . Request::path() : '/';

    function renderSubMenu($menuItems, $userMenus = [])
    {
        $html = '';
        foreach ($menuItems as $menu) {
            // Validasi menu memiliki id dan id termasuk dalam daftar menu user
            if (!isset($menu['id']) || !in_array($menu['id'], $userMenus)) {
                continue;
            }

            $menuClasses = 'menu-item';
            $menuClasses .= !empty($menu['sub_menu']) ? ' has-sub' : '';
            $menuClasses .= !empty($menu['is_active']) ? ' active' : '';

            $html .= '<div class="' . $menuClasses . '">';
            $html .= '<a href="' . $menu['url'] . '" class="menu-link">';
            $html .= !empty($menu['icon']) ? '<div class="menu-icon"><i class="' . $menu['icon'] . '"></i></div>' : '';
            $html .= '<div class="menu-text">' . $menu['title'] . '</div>';
            $html .= !empty($menu['sub_menu']) ? '<div class="menu-caret"></div>' : '';
            $html .= '</a>';

            if (!empty($menu['sub_menu'])) {
                $html .= '<div class="menu-submenu">' . renderSubMenu($menu['sub_menu'], $userMenus) . '</div>';
            }

            $html .= '</div>';
        }
        return $html;
    }

@endphp

<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar {{ $appSidebarClass }}" {{ $appSidebarAttr }}>
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <div class="menu">
            <!-- Profile Section -->
            @if (!$appSidebarSearch)
                <div class="menu-profile">
                    <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile"
                        data-target="#appSidebarProfileMenu">
                        <div class="menu-profile-cover with-shadow"></div>
                        <div class="menu-profile-image menu-profile-image-icon bg-gray-900 text-gray-600">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="menu-profile-info">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">Sean Ngu</div>
                                <div class="menu-caret ms-auto"></div>
                            </div>
                            <small>Front end developer</small>
                        </div>
                    </a>
                </div>
                <div id="appSidebarProfileMenu" class="collapse">
                    <div class="menu-item pt-5px">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-cog"></i></div>
                            <div class="menu-text">Settings</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                            <div class="menu-text">Send Feedback</div>
                        </a>
                    </div>
                    <div class="menu-item pb-5px">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                            <div class="menu-text">Helps</div>
                        </a>
                    </div>
                    <div class="menu-divider m-0"></div>
                </div>
            @endif

            <!-- Search Bar -->
            @if ($appSidebarSearch)
                <div class="menu-search mb-n3">
                    <input type="text" class="form-control" placeholder="Sidebar menu filter..."
                        data-sidebar-search="true" />
                </div>
            @endif

            <!-- Navigation Header -->
            <div class="menu-header">Navigation</div>

            <!-- Render Menu -->
            {!! renderSubMenu($menus) !!}

            <!-- Minify Button -->
            <div class="menu-item d-flex">
                <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify">
                    <i class="fa fa-angle-double-left"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END scrollbar -->
</div>
<div class="app-sidebar-bg" {{ $appSidebarAttr }}></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a>
</div>
<!-- END #sidebar -->
