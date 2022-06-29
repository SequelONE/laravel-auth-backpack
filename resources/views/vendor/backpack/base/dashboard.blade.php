@extends(backpack_view('blank'))

@php
    $users = \App\Models\User::count();

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
                    'class'         => 'card mb-2',
                    'value'         => \App\Models\User::abbr($users),
                    'description'   => 'Registered users.',
                    'progress'      => \App\Models\User::border($users)['percent'], // integer
                    'progressClass' => 'progress-bar bg-danger',
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
                    'type'          => 'progress_white',
                    'class'         => 'card mb-2',
                    'value'         => '11.456',
                    'description'   => 'Registered users.',
                    'progress'      => 57, // integer
                    'progressClass' => 'progress-bar bg-primary',
                    'hint'          => '8544 more until next milestone.',
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
            ],
        ]);
@endphp

@section('content')
    <p>Your custom HTML can live here</p>
@endsection
