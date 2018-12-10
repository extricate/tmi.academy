@component('mail::message')
# Nieuwe offerte aangevraagd door {{ $quote->contact->name }}

{{ $quote->contact->name }} heeft een nieuwe offerte aangevraagd.
{{ $quote->contact->name }} is te bereiken op {{ $quote->contact->email,  $quote->contact->phone }}

@component('mail::table')
| Product       | Kwantiteit    | Prijsopbouw  |
| :-------------|:------------- | ------------:|
| **{{ $quote->product->name }}** | {{ $quote->product->base_price }} | {{ $quote->product->unit_price }} |
@foreach($quote->packages as $package)
| {{ $package->name }} | {{ $package->base_price }} | {{ $package->unit_price }} |
@endforeach
| Studenten      | {{ $quote->students }} | Uitrekenen                     |
| Totaalprijs    |  *zonder BTW*          | €{{ $quote->calculateValue() }} |
@endcomponent

@component('mail::button', ['url' => $quote->url()])
    Bekijk de volledige offerteaanvraag
@endcomponent

Bedankt,<br>
{{ config('app.name') }}
@endcomponent