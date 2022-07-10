@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# {{ trans('mail.whoops') }}
@else
# {{ trans('mail.hello') }}, @if(Auth::check() === true) {{ Auth::user()->name }} @else @php $user = \App\Models\User::where('email', request()->post('email'))->first(); @endphp {{ $user->name }} @endif!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
    {!! $line !!}
@endforeach

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
    {!! $line !!}
@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Salutation --}}
@if (! empty($salutation))
    <div style="text-align: center">
        {{ $salutation }}
    </div>
@else
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
    {{ trans('mail.copyLink', ['actionText' => $actionText]) }} <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
