<x-mail::message>
# Hallo {{ $user->name }}!

Sta je ook vandaag (weer) even stil bij je zegeningen.
Waar mag jij vandaag dankbaar voor zijn?

<x-mail::button :url="$url">
Vul je dankpunt(en) in
</x-mail::button>

</x-mail::message>
