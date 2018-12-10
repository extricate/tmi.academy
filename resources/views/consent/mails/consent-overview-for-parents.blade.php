@component('mail::message')
# Uw toestemmingsformulier voor {{ $student->name }}

Hierbij het toestemmingsformulier met de door u aangegeven toestemmingen.

{{ $student->consent }}

Bedankt,<br>
{{ config('app.name') }}
@endcomponent