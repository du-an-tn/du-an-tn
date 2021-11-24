<?php 
return [
    [
        'label' => 'trang chủ',
        'route' => 'admin.dashboard',
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
        'route' => 'menu.index',
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
        'route' => 'category.index',
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
        'label' => 'Mã giảm giá',
        'route' => 'coupon.index',
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
        'route' => 'qlsanpham.index',
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
        'route' => 'qlthucung.index',
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
        'route' => 'qldichvu.index',
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
                'route' => 'qldichvu.create'
            ],
        ]
    ],
    [
        'label' => 'Tin Tức',
        'route' => 'admin.dashboard',
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
        'route' => 'donhang.index',
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
        'route' => 'admin.dashboard',
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
        'route' => 'admin.file',
        'icon' => 'fa fa-picture-o',
        'items' =>
        [
            [
            'iconnew' => 'fa fa-tachometer',
            'label' => 'QL file',
            'route' => 'admin.file'
            ],
        ]
    ],
]



?>