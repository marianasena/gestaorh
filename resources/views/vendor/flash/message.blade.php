
@foreach ((array) session('flash_notification') as $message)

    @php
        switch ($message['level']) {
            case 'success':
                $message['icon'] = 'ok-sign';
                break;
            case 'error':
                $message['icon'] = 'remove-sign';
                break;
            case 'warning':
                $message['icon'] = 'exclamation-sign';
                break;
            default:
                $message['icon'] = 'info-sign';
        }
    @endphp

    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert alert-dismissable alert-{{ $message['level'] }} {{ $message['important'] ? 'alert-important' : '' }}" >
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="glyphicon glyphicon-{{$message['icon']}}"></span>&nbsp;
            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
