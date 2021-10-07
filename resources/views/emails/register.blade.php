@component('mail::message')
# {{ $details['title'] }}

{{ $details['name'] }}

{{ $details['body'] }}

@component('mail::button', ['url' => $details['url']])
{{ $details['button'] }}
@endcomponent

{{ $details['thanks'] }},<br>
{{ config('app.name') }}
@endcomponent

