@component('mail::message')


{{ $lead['name'] }}<br>
{{ $lead['email'] }}<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
