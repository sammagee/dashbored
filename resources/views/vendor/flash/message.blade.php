@foreach (session('flash_notification', collect())->toArray() as $message)
    <flash data-message="{!! $message['message'] !!}"></flash>
@endforeach

{{ session()->forget('flash_notification') }}
