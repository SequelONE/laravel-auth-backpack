@extends(backpack_view('blank'))

@php
    $users = \App\Models\User::count();
    $memUsage = getServerMemoryUsage(false);

        $widgets['before_content'][] = [
            'type'        => 'jumbotron',
            'heading'     => trans('backpack::base.welcome'),
            'content'     => trans('backpack::base.use_sidebar'),
            'button_link' => backpack_url('logout'),
            'button_text' => trans('backpack::base.logout'),
        ];

        Widget::add([
            'type'    => 'div',
            'class'   => 'row',
            'content' => [ // widgets here
                [
                    'type'          => 'progress_white',
                    'class'         => 'card text-white bg-primary mb-2',
                    'value'         => \App\Models\User::abbr($users),
                    'description'   => 'Registered users.',
                    'progress'      => \App\Models\User::border($users)['percent'], // integer
                    'progressClass' => 'progress-bar bg-success',
                    'hint'          => \App\Models\User::border($users)['border'] . ' more until next milestone.',
                ],
                [
                    'type'          => 'progress_white',
                    'class'         => 'card mb-2',
                    'value'         => '11.456',
                    'description'   => 'Registered users.',
                    'progress'      => 57, // integer
                    'progressClass' => 'progress-bar bg-primary',
                    'hint'          => '8544 more until next milestone.',
                ],
                [
                    'type'          => 'card',
                    'wrapper'       => ['class' => 'col-sm-6 col-lg-3'], // optional
                    'class'         => 'card bg-primary text-white',
                    'content'    => [
                        'body'   => '
                            <strong>Memory</strong>: ' . sprintf("%s / %s (%s%%)", getNiceFileSize($memUsage["total"] - $memUsage["free"]), getNiceFileSize($memUsage["total"]), getServerMemoryUsage(true)) . '<br />
                            <strong>Total space</strong>: ' . use_space() . ' / ' . total_space() . '<br />
                            <strong>Free space</strong>: ' . free_space() .'<br />
                            <strong>PHP Memory Usage</strong>: ' . convert(memory_get_usage(true)) . '
                        ',
                    ]
                ],
                [
                    'type'          => 'card',
                    'wrapper'       => ['class' => 'col-sm-6 col-lg-3'], // optional
                    'class'         => 'card bg-primary text-white',
                    'content'    => [
                        'body'   => '
                            <strong>PHP</strong>: ' . phpversion() .'<br />
                            <strong>Laravel</strong>: ' . App::VERSION() . '<br />
                            <strong>Backpack</strong>: ' . strtok(\PackageVersions\Versions::getVersion('backpack/crud'), '@') . '<br />
                            <strong>Backpack PRO</strong>: ' . backpack_pro_version() . '
                        ',
                    ]
                ],
            ],
        ]);
@endphp

@section('content')
    <p>Your custom HTML can live here</p>
@endsection
