<div class="admin-field">
  <p class="admin-field__label">{{ $label }}</p>
  <div class="admin-image">
    @if ($settings[$key])
    <img class="admin-image__preview" src="{{ asset('storage/' . $settings[$key]) }}" alt="{{ $label }}" />
    @else
    <p class="admin-image__empty">未設定</p>
    @endif
    <div class="admin-image__controls">
      <input type="file" name="{{ $key }}" accept="image/jpeg,image/png,image/webp" />
      @if ($settings[$key])
      <label class="admin-check">
        <input type="checkbox" name="{{ $key }}_delete" value="1" />
        この画像を削除する
      </label>
      @endif
      @isset($help)
      <p class="admin-field__help">{{ $help }}</p>
      @endisset
    </div>
  </div>
  @error($key)
  <p class="admin-field__error">{{ $message }}</p>
  @enderror
</div>
