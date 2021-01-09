<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="/images/new_homepage/logo.svg" class="logo" alt="Civie Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

