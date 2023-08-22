<x-mail::message>
# Hej {{ $user->name }}! Het is weer tijd om je zegeningen op te schrijven.

Wat voor goeds heeft de Heer vandaag voor jou gedaan?

<x-mail::button :url="$url">
Zegening opschrijven
</x-mail::button>

God zegen!<br>
{{ config('app.name') }}
</x-mail::message>
