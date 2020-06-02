<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Lab Survey',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>Lab</b> Survey',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-classes
    |
    */

    'classes_body' => 'text-sm',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'dashboard',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => true,
            'topnav' => true,
        ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        ['header' => 'ข้อมูลพื้นฐานของระบบ'],
        [
            'text'    => 'ข้อมูลใน Drop/Down list',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text'        => 'นิคมอุตสาหกรรม',
                    'url'         => 'industrialEstate',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ข้อมูลนิคมอุตสาหกรรม',
                            'url'  => 'industrialEstate',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลนิคมอุตสาหกรรม',
                            'url'  => 'industrialEstate/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'เครื่องมือวิทยาศาสตร์',
                    'url'         => 'equipment',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ข้อมูลเครื่องมือวิทยาศาสตร์',
                            'url'  => 'equipment',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลเครื่องมือวิทยาศาสตร์',
                            'url'  => 'equipment/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'เทคนิคของเครื่องมือ/อุปกรณ์',
                    'url'         => 'technicalEquipment',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ข้อมูลเทคนิคเครื่องมือ/อุปกรณ์',
                            'url'  => 'technicalEquipment',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลเทคนิคเครื่องมือ/อุปกรณ์',
                            'url'  => 'technicalEquipment/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'ประเภทผลิตภัณฑ์',
                    'url'         => 'productType',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ชื่อประเภทผลิตภัณฑ์',
                            'url'  => 'productType',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลประเภทผลิตภัณฑ์',
                            'url'  => 'productType/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'ประเภทองค์กร',
                    'url'         => 'organisationType',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ชื่อประเภทองค์กร',
                            'url'  => 'organisationType',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลประเภทองค์กร',
                            'url'  => 'organisationType/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'ประเภทกิจการ',
                    'url'         => 'businessType',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ชื่อประเภทกิจการ',
                            'url'  => 'businessType',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลประเภทกิจการ',
                            'url'  => 'businessType/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'ประเภทอุตสาหกรรม',
                    'url'         => 'industrialType',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ชื่อประเภทอุตสาหกรรม',
                            'url'  => 'industrialType',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลประเภทอุตสาหกรรม',
                            'url'  => 'industrialType/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'ประเภทการทดสอบ/สอบเทียบ',
                    'url'         => 'testingCalibratingType',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ชื่อประเภทการทดสอบ/สอบเทียบ',
                            'url'  => 'testingCalibratingType',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มประเภทการทดสอบ/สอบเทียบ',
                            'url'  => 'testingCalibratingType/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'ประเภทห้องปฏิบัติการ',
                    'url'         => 'laboratoryType',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ชื่อประเภทห้องปฏิบัติการ',
                            'url'  => 'laboratoryType',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลประเภทห้องปฏิบัติการ',
                            'url'  => 'laboratoryType/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'สาขาเทคโนโลยีของเครื่องมือ',
                    'url'         => 'majorTechnology',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ชื่อสาขาเทคโนโลยี',
                            'url'  => 'majorTechnology',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลสาขาเทคโนโลยี',
                            'url'  => 'majorTechnology/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'วัตถุประสงค์การใช้งานเครื่องมือ',
                    'url'         => 'objectiveUsage',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'วัตถุประสงค์การใช้งาน',
                            'url'  => 'objectiveUsage',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลวัตถุประสงค์การใช้งาน',
                            'url'  => 'objectiveUsage/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                [
                    'text'        => 'การรับรองห้องปฏิบัติการ',
                    'url'         => 'certifyLaboratoryType',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ชื่อการรับรองห้องปฏิบัติการ',
                            'url'  => 'certifyLaboratory',
                            'icon_color' => 'info',
                        ],
                        [
                            'text' => 'เพิ่มข้อมูลการรับรองห้องปฏิบัติการ',
                            'url'  => 'certifyLaboratory/create',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
            ],
        ],
        ['header' => 'ข้อมูลแบบสำรวจ'],
        [
            'text'    => 'บันทึกข้อมูลแบบสำรวจ',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text'        => 'ส่วนที่ 1',
                    'url'         => 'organize',
                    'icon'        => 'far fa-fw fa-file',
                    'label'       => '',
                    'label_color' => 'success',
                    'icon'    => 'fas fa-arrow-alt-circle-right',
                    'submenu' => [
                        [
                            'text' => 'ข้อมูลองค์กร',
                            'url'  => 'organize',
                            'icon_color' => 'info',
                        ],
                    ],
                ],
            ],
        ],
        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],
        ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
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
        [
            'name' => 'Select2',
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
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
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
];
