@extends('admin.layout')

@section('title', 'ログイン')

@section('content')
<div class="admin-login">
  <h1 class="page-title">管理者ログイン</h1>
  <form class="admin-card" action="{{ url('/admin/login') }}" method="post" novalidate>
    @csrf
    <div class="admin-field">
      <label class="admin-field__label" for="email">メールアドレス</label>
      <input class="admin-field__input" type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="username" autofocus />
      @error('email')
      <p class="admin-field__error">{{ $message }}</p>
      @enderror
    </div>
    <div class="admin-field">
      <label class="admin-field__label" for="password">パスワード</label>
      <input class="admin-field__input" type="password" id="password" name="password" autocomplete="current-password" />
      @error('password')
      <p class="admin-field__error">{{ $message }}</p>
      @enderror
    </div>
    <button class="button" type="submit">ログイン</button>
  </form>
</div>
@endsection
