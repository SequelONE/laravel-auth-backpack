@extends(backpack_view('blank'))

@php
    $users = \App\Models\User::count();
    $memUsage = getServerMemoryUsage(false);

        Widget::add([
            'type'    => 'div',
            'class'   => 'row',
            'content' => [ // widgets here
                [
                    'type'          => 'card',
                    'wrapper'       => ['class' => 'col-sm-6 col-lg-3'], // optional
                    'class'         => 'card bg-success text-white',
                    'content'    => [
                        'body'   => '
                            <strong>Version</strong>: <a class="text-white" href="https://github.com/SequelONE/laravel-auth-backpack">v2.0.0</a><br />
                            <strong>Website</strong>: <a class="text-white" href="https://sequel.one">sequel.one</a><br />
                            <strong>Docs</strong>: <a class="text-white" href="https://docs.sequel.one/v2.0/laravel-auth-backpack">docs.sequel.one</a><br />
                            <strong>Blog</strong>: <a class="text-white" href="https://blog.sequel.one">blog.sequel.one</a>
                        ',
                    ]
                ],
                [
                    'type'          => 'card',
                    'wrapper'       => ['class' => 'col-sm-6 col-lg-3'], // optional
                    'class'         => 'card bg-danger text-white',
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
                            <strong>Backpack PRO</strong>: ' . strtok(backpack_pro_version(), '@') . '
                        ',
                    ]
                ],
                [
                    'type'          => 'card',
                    'wrapper'       => ['class' => 'col-sm-6 col-lg-3'], // optional
                    'class'         => 'card bg-white text-black',
                    'content'    => [
                        'body'   => '
                            <p><strong>Cache purge</strong></p>
                            <p><a class="btn btn-outline-warning btn-block" role="button" href="' . backpack_url('purge') . '"><i class="nav-icon la la-trash"></i> <span>Clear cache</span></a></p>
                        ',
                    ]
                ],
            ],
        ]);

        Widget::add([
            'type'        => 'jumbotron',
            'heading'     => 'Welcome!',
            'content'     => 'Use the sidebar to the left to create, edit or delete content.',
            'button_link' => route('logout'),
            'button_text' => 'Logout',
        ]);

        Widget::add([
            'type'    => 'div',
            'class'   => 'row',
            'content' => [ // widgets here
                [
                    'type'          => 'progress_white',
                    'class'         => 'card text-black bg-white mb-2',
                    'value'         => \App\Models\User::abbr($users),
                    'description'   => 'Registered users.',
                    'progress'      => \App\Models\User::border($users)['percent'], // integer
                    'progressClass' => 'progress-bar progress-bar-striped bg-warning',
                    'hint'          => \App\Models\User::border($users)['border'] . ' more until next milestone.',
                ],
                [
                    'type'          => 'progress_white',
                    'class'         => 'card text-white bg-primary mb-2',
                    'value'         => \App\Models\User::abbr($users),
                    'description'   => 'Registered users.',
                    'progress'      => \App\Models\User::border($users)['percent'], // integer
                    'progressClass' => 'progress-bar progress-bar-striped bg-success',
                    'hint'          => \App\Models\User::border($users)['border'] . ' more until next milestone.',
                ],
                [
                    'type'          => 'progress_white',
                    'class'         => 'card text-white bg-danger mb-2',
                    'value'         => \App\Models\User::abbr($users),
                    'description'   => 'Registered users.',
                    'progress'      => \App\Models\User::border($users)['percent'], // integer
                    'progressClass' => 'progress-bar progress-bar-striped bg-warning',
                    'hint'          => \App\Models\User::border($users)['border'] . ' more until next milestone.',
                ],
                [
                    'type'          => 'progress_white',
                    'class'         => 'card text-white bg-success mb-2',
                    'value'         => \App\Models\User::abbr($users),
                    'description'   => 'Registered users.',
                    'progress'      => \App\Models\User::border($users)['percent'], // integer
                    'progressClass' => 'progress-bar progress-bar-striped bg-primary',
                    'hint'          => \App\Models\User::border($users)['border'] . ' more until next milestone.',
                ],
            ],
        ]);
@endphp
