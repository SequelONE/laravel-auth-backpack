@extends(backpack_view('blank'))

@php
    // ---------------------
    // JUMBOTRON widget demo
    // ---------------------
    // Widget::add([
 //        'type'        => 'jumbotron',
 //        'name' 		  => 'jumbotron',
 //        'wrapperClass'=> 'shadow-xs',
 //        'heading'     => trans('backpack::base.welcome'),
 //        'content'     => trans('backpack::base.use_sidebar'),
 //        'button_link' => backpack_url('logout'),
 //        'button_text' => trans('backpack::base.logout'),
 //    ])->to('before_content')->makeFirst();

    // -------------------------
    // FLUENT SYNTAX for widgets
    // -------------------------
    // Using the progress_white widget
    //
    // Obviously, you should NOT do any big queries directly in the view.
    // In fact, it can be argued that you shouldn't add Widgets from blade files when you
    // need them to show information from the DB.
    //
    // But you do whatever you think it's best. Who am I, your mom?
    $userCount = App\Models\User::count();
    $pageCount = App\Models\Page::count();
    $menuCount = App\Models\MenuItem::count();
    $contextCount = App\Models\Context::count();
    $articleCount = App\Models\Article::count();
    $lastArticle = App\Models\Article::orderBy('date', 'DESC')->first();
    $users = \App\Models\User::count();
    $memUsage = getServerMemoryUsage(false);
    $domain = parse_url(request()->root())['host'];
    $memoryUsage = getNiceFileSize($memUsage["total"] - $memUsage["free"]);

    $spaceUsageValue = space(disk_total_space(base_path()) - disk_free_space(base_path()));
    $spaceTotalValue = space(disk_total_space(base_path()));
    $spaceFreeValue = space(disk_free_space(base_path()));

    $memoryUsageValue = memory($memUsage["total"] - $memUsage["free"]);
    $memoryTotalValue = memory($memUsage["total"]);
    $memoryFreeValue = memory($memUsage["free"]);

    $memory_limit = ini_get('memory_limit');
    $memory_usage = convert(memory_get_usage(true));
    preg_match('/^(\d+)(.)$/', $memory_limit, $matches);

    $phpMemoryUsageValue = convertValue(memory_get_usage(true));
    $phpMemoryTotalValue = $matches[1];
    $phpMemoryFreeValue = $matches[1] - $phpMemoryUsageValue;

    if($lastArticle !== null) {
        $lastArticleDaysAgo = \Carbon\Carbon::parse($lastArticle->date)->diffInDays(\Carbon\Carbon::today());
    } else {
        $lastArticleDaysAgo = 0;
    }

     // notice we use Widget::add() to add widgets to a certain group
    Widget::add()->to('before_content')->type('div')->class('row mt-3')->content([
        // notice we use Widget::make() to add widgets as content (not in a group)
        Widget::make()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start') // start|top|bottom
            ->accentColor('success') // primary|secondary|warning|danger|info
            ->ribbon(['top', 'la-code-fork']) // ['top|right|bottom']
            ->description(trans('admin.version') . ' <a href="https://github.com/SequelONE/laravel-auth-backpack">v4.0.4</a>')
            ->hint('<br />
                <strong>' . trans('admin.website') . '</strong>: <a href="https://' . $domain . '">' . $domain . '</a><br />
                <strong>' . trans('admin.docs') . '</strong>: <a class="text-dark" href="https://docs.sequel.one/v4/laravel-auth-backpack"><i class="la la-question-circle" aria-hidden="true"></i></a><br /><br />
            '),
        Widget::make()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start') // start|top|bottom
            ->accentColor('info') // primary|secondary|warning|danger|info
            ->ribbon(['top', 'la-info-circle']) // ['top|right|bottom']
            ->description('Backpack <a target="_blank" href="https://backpackforlaravel.com/docs/6.x/">' . strtok(\Composer\InstalledVersions::getVersion('backpack/crud'), '@') . '</a>')
            ->hint('<br />
                <strong>PHP</strong>: ' . phpversion() .'<br />
                <strong>Laravel</strong>: ' . App::VERSION() . '<br />
                <strong>Backpack PRO</strong>: ' . strtok(backpack_pro_version(), '@') . '
            '),
        Widget::add()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start') // start|top|bottom
            ->accentColor('danger') // primary|secondary|warning|danger|info
            ->ribbon(['top', 'la-bolt']) // ['top|right|bottom']
            ->description(trans('admin.free-memory'))
            ->progressClass('progress-bar')
            ->value(getNiceFileSize($memUsage["free"]))
            ->progress($memoryUsageValue / $memoryFreeValue * 100)
            ->hint(sprintf("%s / %s (%s%%)", getNiceFileSize($memUsage["total"] - $memUsage["free"]), getNiceFileSize($memUsage["total"]), getServerMemoryUsage(true)))
            ->onlyHere(),
        Widget::make([
            'type' => 'progress',
            'class'=> 'card mb-3',
            'statusBorder' => 'start', // start|top|bottom
            'accentColor' => 'warning', // primary|secondary|warning|danger|info
            'ribbon' => ['top', 'la-history'], // ['top|right|left|bottom', 'la-xxx']
            'value' => '
                <a class="btn btn-outline-warning btn-block" role="button" href="' . backpack_url('purge') . '"><i class="nav-icon la la-trash"></i> <span>Clear cache</span></a>
            ',
            'description' => 'Cache purge',
            'hint' => '',
        ]),
        Widget::make()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start') // start|top|bottom
            ->accentColor('success') // primary|secondary|warning|danger|info
            ->ribbon(['top', 'la-user']) // ['top|right|bottom']
            ->progressClass('progress-bar')
            ->value($userCount)
            ->description('Registered users.')
            ->progress(100*(int)$userCount/1000)
            ->hint(1000-$userCount.' more until next milestone.'),
        // alternatively, to use widgets as content, we can use the same add() method,
        // but we need to use onlyHere() or remove() at the end
        Widget::add()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start') // start|top|bottom
            ->accentColor('danger') // primary|secondary|warning|danger|info
            ->ribbon(['top', 'la-bell']) // ['top|right|bottom']
            ->description('Registered users.')
            ->progressClass('progress-bar')
            ->value($articleCount)
            ->description('Articles.')
            ->progress(80)
            ->hint('Great! Don\'t stop.')
            ->onlyHere(),
        // alternatively, you can just push the widget to a "hidden" group
        Widget::make()
            ->group('hidden')
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start') // start|top|bottom
            ->accentColor('info') // primary|secondary|warning|danger|info
            ->ribbon(['top', 'la-star']) // ['top|right|bottom']
            ->value($lastArticleDaysAgo.' days')
            ->progressClass('progress-bar')
            ->description('Since last article.')
            ->progress(30)
            ->hint('Post an article every 3-4 days.'),
        // both Widget::make() and Widget::add() accept an array as a parameter
        // if you prefer defining your widgets as arrays
        Widget::make([
            'type' => 'progress',
            'class'=> 'card mb-3',
            'statusBorder' => 'start', // start|top|bottom
            'accentColor' => 'primary', // primary|secondary|warning|danger|info
            'ribbon' => ['top', 'la-list'], // ['top|right|left|bottom', 'la-xxx']
            'progressClass' => 'progress-bar',
            'value' => $contextCount,
            'description' => 'Context',
            'progress' => (int)$contextCount/75*100,
            'hint' => $contextCount>75?'Try to stay under 75 products.':'Good. Good.',
        ]),
        Widget::make([
            'type' => 'progress',
            'class'=> 'card mb-3',
            'statusBorder' => 'start', // start|top|bottom
            'accentColor' => 'info', // primary|secondary|warning|danger|info
            'ribbon' => ['top', 'la-list'], // ['top|right|left|bottom', 'la-xxx']
            'progressClass' => 'progress-bar',
            'value' => $menuCount,
            'description' => 'Menu items',
            'progress' => (int)$menuCount/75*100,
            'hint' => $menuCount>75?'Try to stay under 75 products.':'Good. Good.',
        ]),
        Widget::make([
            'type' => 'progress',
            'class'=> 'card mb-3',
            'statusBorder' => 'start', // start|top|bottom
            'accentColor' => 'success', // primary|secondary|warning|danger|info
            'ribbon' => ['top', 'la-list'], // ['top|right|left|bottom', 'la-xxx']
            'progressClass' => 'progress-bar',
            'value' => $pageCount,
            'description' => 'Pages',
            'progress' => (int)$pageCount/75*100,
            'hint' => $pageCount>75?'Try to stay under 75 products.':'Good. Good.',
        ]),
        Widget::add()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start') // start|top|bottom
            ->accentColor('secondary') // primary|secondary|warning|danger|info
            ->ribbon(['top', 'la-thermometer-quarter']) // ['top|right|bottom']
            ->description(trans('admin.free-php-memory'))
            ->progressClass('progress-bar')
            ->value($phpMemoryFreeValue . ' MB')
            ->progress($phpMemoryUsageValue / $phpMemoryFreeValue * 100)
            ->hint(convert(memory_get_usage(true)) . ' / ' . $memory_limit)
            ->onlyHere(),
        Widget::add()
            ->type('progress')
            ->class('card mb-3')
            ->statusBorder('start') // start|top|bottom
            ->accentColor('warning') // primary|secondary|warning|danger|info
            ->ribbon(['top', 'la-cloud']) // ['top|right|bottom']
            ->description(trans('admin.free-space'))
            ->progressClass('progress-bar')
            ->value(free_space())
            ->progress($spaceUsageValue / $spaceFreeValue * 100)
            ->hint(use_space() . ' / ' . total_space())
            ->onlyHere(),
    ]);

    $widgets['after_content'][] = [
        'type' => 'div',
        'class' => 'row',
        'content' => [ // widgets
            [
                'type' => 'card',
                // 'wrapperClass' => 'col-sm-6 col-md-4', // optional
                'class' => 'card my-3', // optional
                'accentColor' => 'warning',
                'ribbon' => ['bottom', 'la-star'], // ['top|right|left|bottom', 'la-xxx']
                'statusBorder' => 'top', // start|top|bottom
                'content' => [
                    'header' => 'Some card title', // optional
                    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>, ornare quis aliquet ut, volutpat et lectus. Aliquam a egestas elit. <i>Nulla posuere</i>, sem et porttitor mollis, massa nibh sagittis nibh, id porttitor nibh turpis sed arcu.',
                    'link' => [
                          'labelText' => 'See more',
                          'href' => backpack_url('user'),
                        ],
                    ],
                ],
            [
                'type' => 'card',
                // 'wrapperClass' => 'col-sm-6 col-md-4', // optional
                'accentColor' => 'info',
                'ribbon' => ['right', 'la-trophy'], // ['top|right|left|bottom', 'la-xxx']
                'statusBorder' => 'top', // start|top|bottom
                'class' => 'card my-3', // optional
                'content' => [
                  'header' => 'Another card title', // optional
                  'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>, ornare quis aliquet ut, volutpat et lectus. Aliquam a egestas elit. <i>Nulla posuere</i>, sem et porttitor mollis, massa nibh sagittis nibh, id porttitor nibh turpis sed arcu.',
                  'link' => [
                      'labelText' => 'See list',
                      'href' => backpack_url('user'),
                    ],
                ],
            ],
            [
                'type' => 'card',
                'wrapperClass' => 'col-md-12 col-lg-4', // optional
                'class' => 'card my-3', // optional
                'accentColor' => 'secondary',
                'ribbon' => ['bottom', 'la-list'], // ['top|right|left|bottom', 'la-xxx']
                'statusBorder' => 'top', // start|top|bottom
                'content' => [
                    'header' => 'Yet another card title', // optional
                    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>, ornare quis aliquet ut, volutpat et lectus. Aliquam a egestas elit. <i>Nulla posuere</i>, sem et porttitor mollis, massa nibh sagittis nibh, id porttitor nibh turpis sed arcu.',
                    'link' => [
                        'labelText' => 'See all',
                        'href' => backpack_url('user'),
                    ],
                ],
            ],
        ]
    ];

    $widgets['after_content'][] = [
      'type'         => 'alert',
      'class'        => 'alert alert-danger mb-3',
      'heading'      => 'Demo Refreshes Every Hour on the Hour',
      'content'      => 'At hh:00, all custom entries are deleted, all files, everything. This cleanup is necessary because developers like to joke with their test entries, and mess with stuff. But you know that :-) Go ahead - make a developer smile.' ,
      'close_button' => true, // show close button or not
    ];

    $widgets['before_content'][] = [
      'type' => 'div',
      'class' => 'row',
      'content' => [ // widgets
              [
                'type' => 'chart',
                'wrapperClass' => 'col-md-6',
                // 'class' => 'col-md-6',
                'controller' => \App\Http\Controllers\Admin\Charts\LatestUsersChartController::class,
                'content' => [
                    'header' => 'New Users Past 7 Days', // optional
                    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional

                ]
            ],
            [
                'type' => 'chart',
                'wrapperClass' => 'col-md-6',
                // 'class' => 'col-md-6',
                'controller' => \App\Http\Controllers\Admin\Charts\NewEntriesChartController::class,
                'content' => [
                    'header' => 'New Entries', // optional
                    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
                ]
            ],
        ]
    ];

    $widgets['after_content'][] = [
      'type' => 'div',
      'class' => 'row',
      'content' => [ // widgets

            [
                'type' => 'chart',
                'wrapperClass' => 'col-md-4 mb-3',
                // 'class' => 'col-md-6',
                'controller' => \App\Http\Controllers\Admin\Charts\Pies\ChartjsPieController::class,
                'content' => [
                    'header' => 'Pie Chart - Chartjs', // optional
                    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
                ]
            ],
            [
                'type' => 'chart',
                'wrapperClass' => 'col-md-4 mb-3',
                // 'class' => 'col-md-6',
                'controller' => \App\Http\Controllers\Admin\Charts\Pies\EchartsPieController::class,
                'content' => [
                    'header' => 'Pie Chart - Echarts', // optional
                    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
                ]
            ],
            [
                'type' => 'chart',
                'wrapperClass' => 'col-md-4 mb-3',
                // 'class' => 'col-md-6',
                'controller' => \App\Http\Controllers\Admin\Charts\Pies\HighchartsPieController::class,
                'content' => [
                    'header' => 'Pie Chart - Highcharts', // optional
                    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
                ]
            ],

      ]
    ];


    $widgets['after_content'][] = [
      'type' => 'div',
      'class' => 'row',
      'content' => [ // widgets

            [
                'type' => 'chart',
                'wrapperClass' => 'col-md-6',
                // 'class' => 'col-md-6',
                'controller' => \App\Http\Controllers\Admin\Charts\Lines\ChartjsLineChartController::class,
                'content' => [
                    'header' => 'Line Chart - Chartjs', // optional
                    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
                ]
            ],
            [
                'type' => 'chart',
                'wrapperClass' => 'col-md-6 mb-3',
                // 'class' => 'col-md-6',
                'controller' => \App\Http\Controllers\Admin\Charts\Lines\EchartsLineChartController::class,
                'content' => [
                    'header' => 'Line Chart - Echarts', // optional
                    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
                ]
            ],
            [
                'type' => 'chart',
                'wrapperClass' => 'col-md-6 mb-3',
                // 'class' => 'col-md-6',
                'controller' => \App\Http\Controllers\Admin\Charts\Lines\HighchartsLineChartController::class,
                'content' => [
                    'header' => 'Line Chart - Highcharts', // optional
                    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
                ]
            ],
            [
                'type' => 'chart',
                'wrapperClass' => 'col-md-6 mb-3',
                // 'class' => 'col-md-6',
                'controller' => \App\Http\Controllers\Admin\Charts\Lines\FrappeLineChartController::class,
                'content' => [
                    'header' => 'Line Chart - Frappe', // optional
                    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
                ]
            ],


        ]
    ];
@endphp

@section('content')
    {{-- In case widgets have been added to a 'content' group, show those widgets. --}}
    @include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('group', 'content')->toArray() ])
@endsection
