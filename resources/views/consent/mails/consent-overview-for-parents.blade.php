@component('mail::message')
# Uw toestemmingsformulier voor {{ $student->name }}
Beste {{ $student->consent->consenter_name }},

Hierbij het toestemmingsformulier met de door u aangegeven toestemmingen.

Tijdens de lessen Mediawijsheid worden video's en foto's gemaakt, waarbij mijn kind herkenbaar in beeld wordt gebracht. Ik geef TMI.academy daarvoor toestemming. De foto's en video's die gemaakt zijn bij deze lessen mogen door TMI.academy gebruikt worden in de communicatievormen die ik hieronder heb aangekruist:

@component('mail::table')
| Type toestemming |     Toegekend |
| :----------      | ---------------:|
| Voor evaluatie doeleinden zodat we de workshops beter kunnen maken | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ yesOrNo($student->consent->evaluation) }} |
| Voor de workshops van deze klas | {{ yesOrNo($student->consent->class) }} |
| Voor de workshops van TMI.academy van deze school | {{ yesOrNo($student->consent->school) }} |
| Voor de workshops van TMI.academy, ook bij andere scholen en jongerenorganisaties | {{ yesOrNo($student->consent->other_schools) }} |
| Ter illustratie van het werk van TMI.academy op besloten gelegenheden. Bijvoorbeeld bij presentaties over ons werk of bij gesprekken met andere scholen of instellingen. | {{ yesOrNo($student->consent->illustrations) }} |
| Op de website en social media van TMI.academy, bijvoorbeeld in een compilatie van video's | {{ yesOrNo($student->consent->website) }} |
@endcomponent

Het Ministerie van Justitie en Veiligheid, die dit project heeft gesubsidieerd, mag deze foto’s en video’s die gemaakt zijn bij deze lessen gebruiken in de communicatievormen die ik hieronder heb aangekruist:
@component('mail::table')
| Type toestemming | Toegekend |
| :------------- | ------------:|
| Voor evaluatie doeleinden zodat de workshops kunnen worden verbeterd. | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ yesOrNo($student->consent->ministry_evaluation) }} |
| Ter illustratie van de betrokkenheid van het Ministerie van Justitie en veiligheid op besloten gelegenheden. Bijvoorbeeld bij presentaties over deze workshops. | {{ yesOrNo($student->consent->ministry_illustration) }} |
| Op de website en social media van het Ministerie van Justitie, bijvoorbeeld in een compilatie van video's. | {{ yesOrNo($student->consent->ministry_website) }} |
@endcomponent

Datum getekend: {{ $student->consent->created_at }}

Getekend door: {{ $student->consent->consenter_name }}

Bedankt,<br>
{{ config('app.name') }}
@endcomponent