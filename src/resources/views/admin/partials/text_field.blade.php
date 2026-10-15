<div class="admin-field">
  <label class="admin-field__label" for="{{ $key }}">{{ $label }}</label>
  @if (!empty($multiline))
  <textarea class="admin-field__input admin-field__input--textarea" id="{{ $key }}" name="{{ $key }}" rows="{{ $rows ?? 4 }}">{{ old($key, $settings[$key]) }}</textarea>
  @else
  <input class="admin-field__input" type="{{ $type ?? 'text' }}" id="{{ $key }}" name="{{ $key }}" value="{{ old($key, $settings[$key]) }}" placeholder="{{ $placeholder ?? '' }}" />
  @endif
  @isset($help)
  <p class="admin-field__help">{{ $help }}</p>
  @endisset
  @error($key)
  <p class="admin-field__error">{{ $message }}</p>
  @enderror
</div>
