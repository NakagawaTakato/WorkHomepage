@extends('layouts.site')

@section('title', 'LINEでご相談 | BLUE TAB ホームページ制作')

@section('css')
<link rel="stylesheet" href="{{ asset('css/line.css') }}?v={{ filemtime(public_path('css/line.css')) }}" />
@endsection

@section('content')
<div class="sub-page line-page">
  @include('partials.sub_header')

  <main>
    <h1 class="page-title"><span class="line-page__brand">LINE</span>でご相談いただけます</h1>
    <p class="page-lead">QRコードをスマホのLINEで読み取ると、友だち追加ができます。ホームページ制作のご相談や、ご質問をお気軽にお送りください。</p>

    <section class="qr">
      <h2 class="qr__title">LINEで友だち追加</h2>
      <p class="qr__text">スマホのLINEで、このQRコードを読み取ってください。</p>
      <div class="qr__frame">
        @if ($qrCode)
        <img class="qr__image" src="{{ $qrCode }}" alt="LINE友だち追加のQRコード" width="200" height="200" />
        @else
        <p class="qr__placeholder">LINEのURLを入れると、ここにQRコードが出ます</p>
        @endif
      </div>
      @if ($lineUrl)
      <p class="qr__text">スマホでご覧の方は、下のボタンからも追加できます。</p>
      <a class="button button--green" href="{{ $lineUrl }}" target="_blank" rel="noopener">LINEを開く</a>
      @endif
    </section>

    <a class="button button--outline" href="{{ route('home') }}">トップページへ戻る</a>
  </main>
</div>
@endsection
