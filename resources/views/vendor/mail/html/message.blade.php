<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
{{ config('app.name') }}
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
<p class="copyright">
© {{ date('Y') }} {{ config('app.name') }}
<p>Voorstraat 14 · 9291CK · Kollum · Nederland</p>
<p>info@blessingsapp.nl</p>
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
