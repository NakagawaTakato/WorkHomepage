@extends('layouts.site')

@section('title', '事業者情報・お取引について | BLUE TAB ホームページ制作')

@section('css')
<link rel="stylesheet" href="{{ asset('css/tokushoho.css') }}?v={{ filemtime(public_path('css/tokushoho.css')) }}" />
@endsection

@section('content')
<div class="sub-page tokushoho-page">
  @include('partials.sub_header')

  <main>
    <h1 class="page-title">事業者情報・お取引について</h1>
    <p class="page-lead">ご依頼の前に確認していただきたい、事業者の情報と、お金・契約に関するルールをまとめています。分からない点は、ご契約の前にいつでもご質問ください。</p>

    <section class="tokushoho__section">
      <h2>事業者情報(特定商取引法に基づく表記)</h2>
      <dl class="info">
        <div class="info__row">
          <dt>屋号</dt>
          <dd>BLUE TAB ホームページ制作</dd>
        </div>
        <div class="info__row">
          <dt>運営責任者</dt>
          <dd>@include('partials.setting_value', ['value' => $settings['owner_name'], 'placeholder' => '本名を入力'])</dd>
        </div>
        <div class="info__row">
          <dt>所在地</dt>
          <dd>@include('partials.setting_value', ['value' => $settings['address'], 'placeholder' => '住所を入力'])</dd>
        </div>
        <div class="info__row">
          <dt>電話番号</dt>
          <dd>@include('partials.setting_value', ['value' => $settings['tel'], 'placeholder' => '電話番号を入力'])</dd>
        </div>
        <div class="info__row">
          <dt>メールアドレス</dt>
          <dd>@include('partials.setting_value', ['value' => $settings['email'], 'placeholder' => 'メールアドレスを入力'])</dd>
        </div>
        <div class="info__row">
          <dt>対応時間</dt>
          <dd>{{ config('site.business_hours') }}</dd>
        </div>
        <div class="info__row">
          <dt>事業形態</dt>
          <dd>個人事業主(開業届 提出済み・@include('partials.setting_value', ['value' => $settings['opened_on'], 'placeholder' => '開業日を入力']))</dd>
        </div>
        <div class="info__row">
          <dt>サービス内容</dt>
          <dd>ホームページの企画・制作、システム開発、公開後の保守</dd>
        </div>
        <div class="info__row">
          <dt>販売価格</dt>
          <dd>ご相談内容に応じて、お見積書に記載します(料金の目安は<a href="{{ route('home') }}#price">トップページ</a>)。<br />保守プランは月額5,500円〜(税込)。</dd>
        </div>
        <div class="info__row">
          <dt>代金以外の費用</dt>
          <dd>ドメイン・サーバー等の実費が必要な場合は、お見積書に明記します。</dd>
        </div>
        <div class="info__row">
          <dt>お支払い方法</dt>
          <dd>初期費用:手渡し、またはクレジットカード / 月額(保守プラン):クレジットカードの自動決済</dd>
        </div>
        <div class="info__row">
          <dt>お支払い時期</dt>
          <dd>@include('partials.setting_value', ['value' => $settings['payment_timing'], 'placeholder' => '例:ご契約時に○%、納品時に○%'])(お見積書に記載します)</dd>
        </div>
        <div class="info__row">
          <dt>納期</dt>
          <dd>お見積り時にお伝えします。</dd>
        </div>
        <div class="info__row">
          <dt>キャンセル・返金</dt>
          <dd>下の「キャンセルと返金について」をご覧ください。</dd>
        </div>
      </dl>
    </section>

    <section class="tokushoho__section">
      <h2>お金の流れについて</h2>
      <ul>
        <li>ご契約の前に、内容・金額・納期・お支払い時期を<strong>お見積書(書面またはメール)</strong>でお渡しし、ご納得いただいてから着手します。</li>
        <li>お見積書にない費用を、あとから請求することはありません。内容を追加したい場合は、先に金額をお伝えして、ご了承をいただいてから進めます。</li>
        <li>クレジットカードをお選びの方には、お見積りのあとに、決済サービス会社の安全な画面で、お支払いリンクをお送りします。カード番号などを、メールやLINE、このホームページに入力していただくことはありません。</li>
        <li>お支払いのあとには、領収書(または請求書の控え)を発行します。</li>
      </ul>
    </section>

    <section class="tokushoho__section">
      <h2>キャンセルと返金について</h2>
      @unless ($settings['cancel_policy_confirmed'])
      <p><span class="todo">以下は案です。内容をご確認のうえ、実際の運用に合わせて修正してください。</span></p>
      @endunless
      <ul>
        @foreach (preg_split('/\R/u', (string) $settings['cancel_policy'], -1, PREG_SPLIT_NO_EMPTY) as $line)
        <li>{{ $line }}</li>
        @endforeach
      </ul>
    </section>

    <section class="tokushoho__section">
      <h2>権利・納品・保守について</h2>
      <ul>
        <li>納品物の著作権は、@include('partials.setting_value', ['value' => $settings['copyright'], 'placeholder' => 'お支払い完了後にお客さまへ譲渡する / 当方が保有する 等を選択'])。</li>
        <li>制作実績として公開してよいかどうかは、必ず事前にご相談します。許可なく掲載しません。</li>
        <li>保守プランは、いつでも解約できます。@include('partials.setting_value', ['value' => $settings['cancel_deadline'], 'placeholder' => '解約の申し出期限を入力(例:前月末まで)'])</li>
        <li>お客さまからお預かりした情報(原稿・画像・アカウント情報など)は、制作と保守の目的以外には使いません。</li>
      </ul>
    </section>

    <section class="tokushoho__section">
      <h2>個人情報の取扱い</h2>
      <p>お問い合わせでお預かりするお名前・連絡先・ご相談内容は、ご返信とお見積りのためだけに使い、ご本人の同意なく第三者へ提供しません。詳しくは<a href="{{ route('contact') }}#privacy">お問い合わせフォームの「個人情報の取扱い」</a>をご覧ください。</p>
    </section>

    <p class="tokushoho__back"><a class="text-link" href="{{ route('home') }}">← トップページへ戻る</a></p>
  </main>
</div>
@endsection
