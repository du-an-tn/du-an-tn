<?php 
return [
    [
        'label' => 'trang chủ',
        'routes' => 'admin.dashboard',
        'icon' => 'fa fa-laptop',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-globe',
            'label' => 'dashboard',
            'route' => 'admin.dashboard'
            ],
        ]
    ],
    [
        'label' => 'menu',
        'routes' => 'menu.index',
        'icon' => 'fa fa-th-list',
        'items' =>
            [
                [
                'iconnew' => 'fa fa-th-large',
                'label' => 'Xem menu',
                'route' => 'menu.index'
                ],
                [
                'iconnew' => 'fa fa-columns',
                'label' => 'Thêm menu',
                'route' => 'menu.create'
                ],
            ]
    ],
    [
        'label' => 'Danh mục',
        'routes' => 'category.index',
        'icon' => 'fa fa-outdent',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-table',
            'label' => 'Xem Danh mục',
            'route' => 'category.index',
            ],
            [
            'iconnew' => 'fa fa-clipboard',
            'label' => 'Thêm danh mục',
            'route' => 'category.create'
            ],
        ]
    ],
    [
        'label' => 'slide website',
        'routes' => 'slide.index',
        'icon' => 'fa fa-outdent',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-table',
            'label' => 'Xem slide',
            'route' => 'slide.index',
            ],
            [
            'iconnew' => 'fa fa-clipboard',
            'label' => 'Thêm slide',
            'route' => 'slide.create'
            ],
        ]
    ],
    [
        'label' => 'Mã giảm giá',
        'routes' => 'coupon.index',
        'icon' => 'fa fa-chain-broken',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-table',
            'label' => 'Ds mã giảm giá',
            'route' => 'coupon.index',
            ],
            [
            'iconnew' => 'fa fa-clipboard',
            'label' => 'Thêm mã giảm giá',
            'route' => 'coupon.create'
            ],
        ]
    ],
    [
        'label' => 'QL sản phẩm',
        'routes' => 'qlsanpham.index',
        'icon' => 'fa fa-tasks',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-folder',
            'label' => 'QL sản phẩm',
            'route' => 'qlsanpham.index'
            ],
            [
                'iconnew' => 'fa fa-indent',
                'label' => 'Thêm sản phẩm',
                'route' => 'qlsanpham.create'
            ],
            // [
            //     'iconnew' => 'fa fa-pagelines',
            //     'label' => 'QL phối giống',
            //     'route' => 'qlthucung.index'
            // ],
        ]
    ],
    [
        'label' => 'QL Thú cưng',
        'routes' => 'qlthucung.index',
        'icon' => 'fa fa-github-alt',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-indent',
            'label' => 'Danh sách thú cưng',
            'route' => 'qlthucung.index'
            ],
            [
                'iconnew' => 'fa fa-indent',
                'label' => 'Thêm thú cưng',
                'route' => 'qlthucung.create'
                ],
        ]
    ],
    [
        'label' => 'QL Dịch vụ',
        'routes' => 'qldichvu.index',
        'icon' => 'fa fa-calendar-o',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-heart',
            'label' => 'Danh sách cơ sở',
            'route' => 'qldichvu.index'
            ],
            [
                'iconnew' => 'fa fa-inbox',
                'label' => 'Danh sách dịch vụ',
                'route' => 'chitietdichvu.index'
            ],
            [
                'iconnew' => 'fa fa-inbox',
                'label' => 'Danh sách đặt lịch',
                'route' => 'datlich.index'
            ],
        ]
    ],
    [
        'label' => 'Tin Tức',
        'routes' => 'admin.dashboard',
        'icon' => 'fa fa-signal',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-bookmark-o',
            'label' => 'QL Tin tức',
            'route' => 'news.index'
            ],
            [
                'iconnew' => 'fa fa-rss',
                'label' => 'Thêm Tin tức',
                'route' => 'news.create'
                ],
        ]
    ],
    [
        'label' => 'QL đơn hàng',
        'routes' => 'donhang.index',
        'icon' => 'fa fa-truck',
        'items' =>
        [
            [
                'iconnew' => 'fa fa-book',
                'label' => 'DS đơn hàng',
                'route' => 'donhang.index'
                ],
        ]
    ],
    [
        'label' => 'account',
        'routes' => 'admin.dashboard',
        'icon' => 'fa fa-user',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-rocket',
            'label' => 'Tổng hợp account',
            'route' => 'account.index'
            ],
        ]
    ],
    [
        'label' => 'file hình ảnh',
        'routes' => 'admin.file',
        'icon' => 'fa fa-picture-o',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-tachometer',
            'label' => 'QL file',
            'route' => 'admin.file'
            ],
        ]
    ]
]



?>