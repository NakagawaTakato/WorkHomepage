@extends('layouts.site')

@section('title', 'お問い合わせフォーム | BLUE TAB ホームページ制作')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}?v={{ filemtime(public_path('css/contact.css')) }}" />
@endsection

@section('content')
<div class="sub-page contact-page">
  @include('partials.sub_header')

  <main>
    <h1 class="page-title">お問い合わせフォーム</h1>
    <p class="page-lead">ご相談や、ご質問をお送りください。「必須」の項目は必ずご入力ください。内容を確認して、ご連絡します。</p>

    @if (session('sent'))
    <p class="alert alert--success" role="status">お問い合わせを送信しました。内容を確認して、ご連絡します。</p>
    @endif

    @if ($errors->any())
    <p class="alert alert--error" role="alert">入力内容に誤りがあります。赤字の項目をご確認ください。</p>
    @endif

    <form class="form" action="{{ route('contact.store') }}" method="post" novalidate>
      @csrf
      <div class="form__group">
        <p class="form__label">ご相談内容<span class="form__required">必須</span></p>
        <div class="form__choices">
          @foreach (config('site.consultations') as $value => $label)
          <label class="form__choice">
            <input type="checkbox" name="consultations[]" value="{{ $value }}" {{ in_array($value, old('consultations', [])) ? 'checked' : '' }} />
            {{ $label }}
          </label>
          @endforeach
        </div>
        @error('consultations')
        <p class="form__error">{{ $message }}</p>
        @enderror
        @error('consultations.*')
        <p class="form__error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form__group">
        <label class="form__label" for="name">お名前<span class="form__required">必須</span></label>
        <input class="form__input" type="text" id="name" name="name" value="{{ old('name') }}" autocomplete="name" />
        @error('name')
        <p class="form__error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form__group">
        <label class="form__label" for="email">メールアドレス<span class="form__required">必須</span></label>
        <input class="form__input" type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" />
        @error('email')
        <p class="form__error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form__group">
        <label class="form__label" for="tel">電話番号<span class="form__required">必須</span></label>
        <input class="form__input" type="tel" id="tel" name="tel" value="{{ old('tel') }}" placeholder="例:09012345678" autocomplete="tel" />
        <p class="form__help">ハイフンはあってもなくても大丈夫です。</p>
        @error('tel')
        <p class="form__error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form__group">
        <label class="form__label" for="prefecture">お住まい<span class="form__required">必須</span></label>
        <select class="form__input" id="prefecture" name="prefecture">
          <option value="">選択</option>
          @foreach (config('site.prefectures') as $prefecture)
          <option value="{{ $prefecture }}" {{ old('prefecture') === $prefecture ? 'selected' : '' }}>{{ $prefecture }}</option>
          @endforeach
        </select>
        @error('prefecture')
        <p class="form__error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form__group">
        <label class="form__label" for="age">ご年齢<span class="form__optional">任意</span></label>
        <input class="form__input" type="text" inputmode="numeric" id="age" name="age" value="{{ old('age') }}" placeholder="例:30" />
        @error('age')
        <p class="form__error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form__group">
        <p class="form__label">初期費用のお支払い方法<span class="form__required">必須</span></p>
        <div class="form__choices">
          @foreach (config('site.initial_payments') as $value => $label)
          <label class="form__choice">
            <input type="radio" name="initial_payment" value="{{ $value }}" {{ old('initial_payment') === $value ? 'checked' : '' }} />
            {{ $label }}
          </label>
          @endforeach
        </div>
        @error('initial_payment')
        <p class="form__error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form__group">
        <p class="form__label">月額5,500円(保守プラン)のお支払い方法<span class="form__required">必須</span></p>
        <div class="form__choices">
          @foreach (config('site.monthly_payments') as $value => $label)
          <label class="form__choice">
            <input type="radio" name="monthly_payment" value="{{ $value }}" {{ old('monthly_payment') === $value ? 'checked' : '' }} />
            {{ $label }}
          </label>
          @endforeach
        </div>
        <p class="form__help">保守プランをご希望の方は、「クレジットカードの自動決済」をお選びください。ご不要の方は、「保守プランなし」をお選びください。カード番号などは、このフォームには入力しないでください。決済の手続きは、あらためてご案内します。</p>
        @error('monthly_payment')
        <p class="form__error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form__group">
        <p class="form__label">下記「個人情報の取扱い」に同意する<span class="form__required">必須</span></p>
        <div class="form__agree">
          <label class="form__agree-check">
            <input type="checkbox" id="agree" name="agree" value="1" {{ old('agree') ? 'checked' : '' }} />
            同意する
          </label>
          <p class="form__help">内容は、このページの下にある<a class="text-link" href="#privacy">「個人情報の取扱い」</a>をお読みください。事業者情報やキャンセルについては<a class="text-link" href="{{ route('tokushoho') }}">こちら</a>です。</p>
        </div>
        @error('agree')
        <p class="form__error">{{ $message }}</p>
        @enderror
      </div>

      <button class="button form__submit" type="submit" id="submit">お問い合わせ送信</button>
      <p class="form__help">「同意する」にチェックを入れると、送信できます。</p>
    </form>

    <section class="privacy" id="privacy">
      <h2>個人情報の取扱い</h2>
      <p>BLUE TAB ホームページ制作(以下「当方」)は、お問い合わせフォームでお預かりする個人情報を、次のとおり取り扱います。</p>

      <h3>1. 取得する情報</h3>
      <ul>
        <li>お名前、メールアドレス、電話番号</li>
        <li>お住まい(地域)</li>
        <li>ご年齢(任意)</li>
        <li>ご相談内容(Laravel(PHP)の選択など)</li>
        <li>お支払い方法の選択。カード番号などは取得しません</li>
      </ul>

      <h3>2. 利用目的</h3>
      <ul>
        <li>お問い合わせへの回答と、ご連絡のため</li>
        <li>ご相談やお見積りなど、ご依頼の対応のため</li>
        <li>個人を特定しない形での、問い合わせ傾向の把握のため</li>
      </ul>
      <p>上記以外の目的には使いません。</p>

      <h3>3. 第三者への提供</h3>
      <p>法令に基づく場合を除き、ご本人の同意なく、第三者に個人情報を提供しません。</p>

      <h3>4. 外部サービスの利用</h3>
      <p>フォームの運用などで外部のサービスを使う場合は、必要な範囲に限って情報を預け、適切に管理します。</p>

      <h3>5. 安全管理</h3>
      <p>個人情報の漏えい、紛失、改ざんを防ぐため、適切な安全管理を行います。</p>

      <h3>6. 保管期間</h3>
      <p>ご対応が終わってから1年を目安に保管し、その後は削除します。</p>

      <h3>7. 開示・訂正・削除のご請求</h3>
      <p>ご本人から、お預かりした個人情報の開示、訂正、削除のご請求があった場合は、本人であることを確認したうえで、速やかに対応します。ご連絡は、LINEからお願いします。</p>

      <h3>8. ご入力いただけない場合</h3>
      <p>必須の項目をご入力いただけない場合は、お問い合わせにお答えできないことがあります。ご年齢は任意で、入力しなくても問題ありません。</p>

      <h3>9. 内容の変更</h3>
      <p>この「個人情報の取扱い」は、必要に応じて見直し、変更することがあります。変更後の内容は、このページに掲載します。</p>

      <p class="privacy__date">制定日:2026年10月6日</p>
    </section>

    <a class="button button--outline" href="{{ route('home') }}">トップページへ戻る</a>
  </main>
</div>

<script>
  (function () {
    var agree = document.getElementById('agree');
    var submit = document.getElementById('submit');
    var toggle = function () {
      submit.disabled = !agree.checked;
    };
    agree.addEventListener('change', toggle);
    toggle();
  })();
</script>
@endsection
