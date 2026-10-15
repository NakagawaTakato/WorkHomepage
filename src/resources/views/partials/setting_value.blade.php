@if (filled($value))
{{ $value }}
@else
<span class="todo">{{ $placeholder }}</span>
@endif
