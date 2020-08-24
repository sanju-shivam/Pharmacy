@component('mail::message')
# You have received a new lead


{{ $lead->name }}
{{ $lead->email }}
{{ $lead->phone }}
{{ $lead->requirement }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
