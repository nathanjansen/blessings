@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
<img src="{{ $url }}/notification-logo.png" class="logo" alt="{{ config('app.name') }}">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="header logo-text">{{ $slot }}</td>
</tr>
</table>
</a>
</td>
</tr>
