<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Admin</b>LTE',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration. Currently, two
    | modes are supported: 'fullscreen' for a fullscreen preloader animation
    | and 'cwrapper' to attach the preloader animation into the content-wrapper
    | element and avoid overlapping it with the sidebars and the top navbar.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'mode' => 'fullscreen',
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,
    'disable_darkmode_routes' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Asset Bundling
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Asset Bundling option for the admin panel.
    | Currently, the next modes are supported: 'mix', 'vite' and 'vite_js_only'.
    | When using 'vite_js_only', it's expected that your CSS is imported using
    | JavaScript. Typically, in your application's 'resources/js/app.js' file.
    | If you are not using any of these, leave it as 'false'.
    |
    | For detailed instructions you can look the asset bundling section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // === ADMIN SECTION ===
        [
            'text' => 'Dashboard',
            'url' => '/admin/dashboard',
            'icon' => 'fas fa-tachometer-alt', // Good for dashboard
            'can' => 'is-admin',
        ],
        [
            'text' => 'Membership Plans',
            'url' => 'admin/membership-plans',
            'icon' => 'fas fa-id-badge', // Better for membership plans
            'can' => 'is-admin',
        ],
        [
            'text' => 'Promo',
            'url' => 'admin/promos',
            'icon' => 'fas fa-percentage', // Better for promotions/discounts
            'can' => 'is-admin',
        ],
        [
            'text' => 'Payments',
            'url' => 'admin/payments',
            'icon' => 'fas fa-money-bill-wave', // Better for payments
            'can' => 'is-admin',
        ],
        [
            'text' => 'Verifikasi Pembayaran',
            'url' => 'admin/invoice-memberships',
            'icon' => 'fas fa-clipboard-check', // Better for verification
            'can' => 'is-admin',
        ],
        [
            'text' => 'Crypto Insights',
            'url' => 'admin/crypto-insights',
            'icon' => 'fas fa-file-pdf',
            'can' => 'is-admin',
        ],
        [
            'text' => 'Manajemen Users',
            'icon' => 'fas fa-user-shield', // Better for user management
            'can' => 'is-admin',
            'submenu' => [
                [
                    'text' => 'Daftar Users',
                    'url' => 'admin/users',
                    'icon' => 'fas fa-users', // Standard for user lists
                ],
                [
                    'text' => 'Histori Pembayaran',
                    'url' => 'admin/payments/history',
                    'icon' => 'fas fa-file-invoice', // Better for payment history
                ],
            ],
        ],
        [
            'text' => 'Manajemen Konten',
            'icon' => 'fas fa-edit', // Better for content management
            'can' => 'is-admin',
            'submenu' => [
                [
                    'text' => 'Kategori',
                    'url' => 'admin/category',
                    'icon' => 'fas fa-folder', // Better for categories
                ],
                [
                    'text' => 'Tag',
                    'url' => 'admin/tag',
                    'icon' => 'fas fa-tag', // Standard for tags
                ],
                [
                    'text' => 'Semua Artikel',
                    'url' => 'admin/post',
                    'icon' => 'fas fa-newspaper', // Better for articles
                ],
                [
                    'text' => 'Artikel Terhapus',
                    'url' => 'admin/post/trashed',
                    'icon' => 'fas fa-trash-alt', // Better for trash
                ],
            ],
        ],
        [
            'text' => 'Statistik',
            'url' => 'admin/statistics',
            'icon' => 'fas fa-chart-pie', // Better for statistics
            'can' => 'is-admin',
        ],
        [
            'text' => 'Pengaturan',
            'url' => 'admin/settings',
            'icon' => 'fas fa-sliders-h', // Modern settings icon
            'can' => 'is-admin',
        ],
        [
            'text' => 'Kriptochain',
            'url' => '/',
            'icon' => 'fas fa-project-diagram', // Better for network/chains
            'can' => 'is-admin',
        ],

        // === USER/MEMBER SECTION ===
        [
            'text' => 'Dashboard',
            'url' => '/dashboard',
            'icon' => 'fas fa-home', // Good for user dashboard
            'can' => 'is-user',
        ],
        [
            'text' => 'Membership Saya',
            'url' => '/membership',
            'icon' => 'fas fa-id-card-alt', // Better for membership card
            'can' => 'is-user',
        ],
        [
            'text' => 'Notifikasi',
            'url' => '/membership/notifications',
            'icon' => 'fas fa-bell', // Standard for notifications
            'can' => 'is-user',
        ],
        [
            'text' => 'Histori Pembayaran',
            'url' => '/membership/history',
            'icon' => 'fas fa-receipt', // Better for payment history
            'can' => 'is-user',
        ],
        [
            'text' => 'Crypto Insights',
            'url' => '/crypto-insights',
            'icon' => 'fas fa-file-pdf',
            'can' => 'has-active-membership',
        ],
        [
            'text' => 'Analisis Crypto & Makroekonomi',
            'url' => '/alpha-vantage',
            'icon' => 'fas fa-search-dollar', // Better for analysis
            'can' => 'has-active-membership',
        ],
        [
            'text' => 'Whale BTC',
            'url' => '/whale-transactions',
            'icon' => 'fas fa-whale', // Specific whale icon
            'can' => 'has-active-membership',
        ],
        // [
        //     'text' => 'Sentiment',
        //     'url' => '/crypto/public-list',
        //     'icon' => 'fas fa-smile', // Specific whale icon
        //     'can' => 'has-active-membership',
        // ],
        [
            'text' => 'News',
            'icon' => 'fas fa-newspaper', // Good for news
            'can' => 'has-active-membership',
            'submenu' => [
                [
                    'text' => 'Bitcoin News',
                    'url' => '/news/bitcoin',
                    'icon' => 'fab fa-btc', // Bitcoin logo
                ],
                [
                    'text' => 'Crypto News',
                    'url' => '/news/crypto-news',
                    'icon' => 'fas fa-coins', // Better for general crypto
                ],
                [
                    'text' => 'Blockchain News',
                    'url' => '/news/blockchain-news',
                    'icon' => 'fas fa-link', // Good for blockchain
                ],
            ],
        ],
        [
            'text' => 'Economic Indicators',
            'icon' => 'fas fa-chart-line', // Better for indicators
            'can' => 'has-active-membership',
            'submenu' => [
                [
                    'text' => 'Data Inflasi',
                    'url' => '/inflation',
                    'icon' => 'fas fa-money-bill-trend-up', // Better for inflation
                ],
                [
                    'text' => 'Data Ekonomi',
                    'url' => '/economic/cpi',
                    'icon' => 'fas fa-chart-area', // Better for economic data
                ],
            ],
        ],
        [
            'text' => 'Kriptochain',
            'url' => '/',
            'icon' => 'fas fa-project-diagram', // Consistent with admin
            'can' => 'is-user',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class, JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
