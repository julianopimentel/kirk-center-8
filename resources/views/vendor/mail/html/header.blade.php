<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://www.deskapp.online/assets/brand/coreui-base-white.svg" class="logo" alt="Kirk Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
