<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />
  <title>@yield('title') | BLUE TAB 管理画面</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
  <header class="admin-header">
    <div class="admin-header__inner">
      <a class="logo logo--inline" href="{{ route('admin.settings.edit') }}">
        @include('partials.logo')
        <span class="logo__sub">管理画面</span>
      </a>
      @auth
      <form action="{{ route('admin.logout') }}" method="post">
        @csrf
        <button class="admin-header__logout" type="submit">ログアウト</button>
      </form>
      @endauth
    </div>
  </header>

  <main class="admin-main">
    @yield('content')
  </main>
</body>

</html>
