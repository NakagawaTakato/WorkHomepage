@extends('layouts.site')

@section('title', 'BLUE TAB ホームページ制作')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ filemtime(public_path('css/home.css')) }}" />
@endsection

@section('content')
<header class="header">
  <div class="header__inner">
    <a class="logo" href="{{ route('home') }}">
      @include('partials.logo')
      <span class="header__sub">ホームページ制作</span>
    </a>
    <nav class="header__nav">
      <a href="#strength">特長</a>
      <a href="#service">対応内容</a>
      <a href="#profile">経歴</a>
      <a href="#works">制作実績</a>
      <a href="#price">料金</a>
      <a href="#trust">安心のお約束</a>
      <a href="#flow">制作の流れ</a>
      <a href="#faq">よくある質問</a>
      <a href="#contact">ご相談</a>
      <a href="{{ route('contact') }}">お問い合わせ</a>
    </nav>
  </div>
</header>

<main>
  <div class="inner">
    <section class="hero">
      <div class="hero__body">
        <p class="hero__label">WEBSITE PRODUCTION</p>
        <h1 class="hero__title">最初のご相談から<br />公開まで、<span>私ひとりが</span><br /><span>責任をもって</span>担当します。</h1>
        <p class="hero__text">個人事業主さまから店舗、中小企業さままで、ホームページ制作をお受けしています。Laravel/PHP、Python、Reactでの開発経験があり、見た目だけでなく、お問い合わせフォームや管理画面など動きのある機能もご相談いただけます。</p>
        <div class="hero__buttons">
          <a class="button" href="#contact">無料でご相談する</a>
          <a class="button button--outline" href="#profile">経歴を見る</a>
        </div>
        <ul class="hero__notes">
          <li>@include('partials.icon', ['name' => 'check'])ご相談・お見積りは無料</li>
          <li>@include('partials.icon', ['name' => 'check'])見積書の金額以外は請求しません</li>
        </ul>
      </div>
      <div class="profile-card">
        <h2 class="profile-card__title">ホームページ制作者</h2>
        <p class="profile-card__role">フリーランス</p>
        <p class="profile-card__text">IT専門学校で4年間(ロボット制作で金賞、卒業制作でカプコン賞)、Webスクールで半年間学び、IT開発会社で1年間、Web開発の実務を経験しました。</p>
        <ul class="profile-card__awards">
          <li><span class="badge">金賞</span>ロボット制作</li>
          <li><span class="badge badge--light">カプコン賞</span>卒業制作 ARゲーム</li>
        </ul>
        <ul class="tags">
          <li>Laravel / PHP</li>
          <li>Python</li>
          <li>React</li>
          <li>FastAPI</li>
          <li>C / C++</li>
          <li>C# / Unity</li>
        </ul>
      </div>
    </section>

    <ul class="stats">
      <li class="stats__item">
        <p class="stats__number">4<span>年間</span></p>
        <p class="stats__text">IT専門学校で学習</p>
      </li>
      <li class="stats__item">
        <p class="stats__number">2<span>回</span></p>
        <p class="stats__text">受賞(金賞・カプコン賞)</p>
      </li>
      <li class="stats__item">
        <p class="stats__number">1<span>年間</span></p>
        <p class="stats__text">IT開発会社で実務</p>
      </li>
      <li class="stats__item">
        <p class="stats__number">1<span>人</span></p>
        <p class="stats__text">最初から最後まで担当</p>
      </li>
    </ul>
  </div>

  <section class="strength" id="strength">
    <div class="inner">
      <p class="section__label section__label--white">STRENGTH</p>
      <h2 class="section__title section__title--white">ひとりで対応するから、できること</h2>
      <ul class="strength__list">
        <li class="strength__item">
          <div class="icon-circle icon-circle--white">@include('partials.icon', ['name' => 'chat'])</div>
          <h3>窓口がひとつで早い</h3>
          <p>ご相談から制作、公開後のご連絡まで、すべて私が担当します。担当者の間で話が伝わらない心配がありません。</p>
        </li>
        <li class="strength__item">
          <div class="icon-circle icon-circle--white">@include('partials.icon', ['name' => 'person'])</div>
          <h3>担当が途中で変わらない</h3>
          <p>お客さまの事業やご要望を、最初から最後まで同じ人間が把握したまま進めます。</p>
        </li>
        <li class="strength__item">
          <div class="icon-circle icon-circle--white">@include('partials.icon', ['name' => 'code'])</div>
          <h3>開発経験にもとづく提案</h3>
          <p>飲食店の予約システムを制作した経験があり、React/FastAPIでの開発も経験しているため、予約や問い合わせ管理などの機能もご相談いただけます。</p>
        </li>
      </ul>
    </div>
  </section>

  <div class="inner">
    <section class="section" id="service">
      <p class="section__label">SERVICE</p>
      <h2 class="section__title">こんな方のホームページをつくります</h2>
      <ul class="cards cards--3">
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'person'])</div>
          <h3>個人事業主・フリーランス</h3>
          <p>仕事の内容と人柄が伝わる、名刺がわりの1ページから対応します。</p>
        </li>
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'store'])</div>
          <h3>飲食店・サロンなどの店舗</h3>
          <p>メニュー、料金、アクセス、予約への導線を、スマホで見やすく整えます。</p>
        </li>
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'building'])</div>
          <h3>中小企業</h3>
          <p>会社案内、事業紹介、採用情報など、信頼感のあるコーポレートサイトを制作します。</p>
        </li>
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'window'])</div>
          <h3>ランディングページ</h3>
          <p>サービスの申込や問い合わせにつなげる、1枚完結のページを制作します。</p>
        </li>
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'gear'])</div>
          <h3>機能つきのサイト</h3>
          <p>予約システムや問い合わせフォームなど、動きのある機能を開発します。</p>
        </li>
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'pencil'])</div>
          <h3>修正・更新のご相談</h3>
          <p>既存サイトの修正や、スマホ対応、表示の改善もご相談ください。</p>
        </li>
      </ul>
    </section>

    <section class="section" id="profile">
      <p class="section__label">PROFILE</p>
      <h2 class="section__title">経歴</h2>
      <ol class="timeline">
        <li class="timeline__item">
          <div class="icon-circle timeline__icon">@include('partials.icon', ['name' => 'graduation'])</div>
          <span class="timeline__period">4年間</span>
          <h3>IT専門学校</h3>
          <p><span class="timeline__tag">1年目</span>パソコンの基礎から学び、Excel、Word、PowerPointの使い方を学びました。</p>
          <p><span class="timeline__tag">2年目</span>組込みシステム(C言語)を学び、制作物としてロボットを作成。金賞を受賞しました。</p>
          <p><span class="timeline__tag">3年目</span>ゲーム制作を学び始め、C++ではクラスの仕組みまで深く学習。C言語でインベーダーゲーム、C++で迷路ゲームを制作しました。</p>
          <p><span class="timeline__tag">4年目</span>卒業制作として、UnityのC#でARを使った格闘ゲーム(ストリートファイター風)を制作。カプコン賞を受賞しました。</p>
        </li>
        <li class="timeline__item">
          <span class="timeline__period">半年間</span>
          <h3>就労支援事業所</h3>
          <p><span class="timeline__tag">制作</span>C#を学び、Unityを使って、横スクロールアクションゲーム(スーパーマリオブラザーズ風)を制作しました。</p>
        </li>
        <li class="timeline__item">
          <div class="icon-circle timeline__icon">@include('partials.icon', ['name' => 'code'])</div>
          <span class="timeline__period">半年間</span>
          <h3>Webスクール</h3>
          <p><span class="timeline__tag">前半3か月</span>PHPの基礎を学び、ターミナルの操作も身につけました。</p>
          <p><span class="timeline__tag">後半3か月</span>Figmaで制作物のデザインを確認してから、飲食店の予約システムを制作しました。</p>
        </li>
        <li class="timeline__item">
          <div class="icon-circle timeline__icon">@include('partials.icon', ['name' => 'building'])</div>
          <span class="timeline__period">1年間</span>
          <h3>IT開発会社</h3>
          <p><span class="timeline__tag">前半6か月</span>Pythonを使ってExcelを扱うプログラムを作成し、Excel操作の難しいところまで携わりました。フローチャートを使った設計も経験しました。</p>
          <p><span class="timeline__tag">後半6か月</span>フロントエンドはReactを経験し、バックエンドはFastAPIで開発しました。あわせて、詳細設計書の修正と作成も経験しました。</p>
        </li>
        <li class="timeline__item timeline__item--now">
          <div class="icon-circle timeline__icon">@include('partials.icon', ['name' => 'rocket'])</div>
          <span class="timeline__period">現在</span>
          <h3>フリーランスとして活動</h3>
          <p>これまでの経験を活かし、お客さまのホームページ制作を直接お受けしています。</p>
        </li>
      </ol>
    </section>

    <section class="section" id="works">
      <p class="section__label">WORKS</p>
      <h2 class="section__title section__title--icon">
        <span class="icon-circle icon-circle--small">@include('partials.icon', ['name' => 'trophy'])</span>制作実績
      </h2>
      <ul class="works">
        <li class="works__item">
          @if ($settings['award_gold_image'])
          <a class="works__zoom" href="{{ asset('storage/' . $settings['award_gold_image']) }}" target="_blank" rel="noopener" aria-label="金賞の賞状を全画面で見る">
            <img class="works__image" src="{{ asset('storage/' . $settings['award_gold_image']) }}" alt="金賞の賞状" />
          </a>
          @else
          <div class="works__placeholder">金賞の賞状の<br />写真を入れる枠</div>
          @endif
          <span class="badge">金賞</span>
          <h3>ロボット制作</h3>
          <p>IT専門学校 2年目。組込みシステム(C言語)で制作したロボットで受賞しました。</p>
        </li>
        <li class="works__item">
          @if ($settings['award_capcom_image'])
          <a class="works__zoom" href="{{ asset('storage/' . $settings['award_capcom_image']) }}" target="_blank" rel="noopener" aria-label="カプコン賞の賞状を全画面で見る">
            <img class="works__image" src="{{ asset('storage/' . $settings['award_capcom_image']) }}" alt="カプコン賞の賞状" />
          </a>
          @else
          <div class="works__placeholder">カプコン賞の賞状の<br />写真を入れる枠</div>
          @endif
          <span class="badge badge--light">カプコン賞</span>
          <h3>卒業制作 ARゲーム</h3>
          <p>IT専門学校 4年目。UnityのC#でARを使った格闘ゲーム(ストリートファイター風)を制作し、受賞しました。</p>
        </li>
      </ul>
      <h3 class="works__subtitle">そのほかの制作物</h3>
      <ul class="tags">
        <li>インベーダーゲーム(C言語)</li>
        <li>迷路ゲーム(C++)</li>
        <li>横スクロールアクションゲーム(C# / Unity)</li>
        <li>飲食店の予約システム(Laravel / PHP)</li>
        <li>Excelを扱うプログラム(Python)</li>
        <li>React / FastAPIでの開発</li>
      </ul>
      @if (filled($settings['voice_notice_strong']) || filled($settings['voice_notice_body']))
      <p class="notice"><strong>{{ $settings['voice_notice_strong'] }}</strong>{!! nl2br(e($settings['voice_notice_body'])) !!}</p>
      @endif
    </section>

    <section class="section" id="price">
      <p class="section__label">PRICE</p>
      <h2 class="section__title section__title--icon">
        <span class="icon-circle icon-circle--small">@include('partials.icon', ['name' => 'coin'])</span>料金の目安
      </h2>
      <div class="price">
        <p class="price__caption">制作内容ごとの、1ページの相場です。</p>
        <table class="price__table">
          <tr>
            <th>制作内容</th>
            <th>1ページの相場</th>
          </tr>
          <tr>
            <td>シンプルなページ(既存デザイン・テンプレート使用)</td>
            <td>1〜5万円</td>
          </tr>
          <tr>
            <td>一般的なWebページ</td>
            <td>5〜15万円</td>
          </tr>
          <tr>
            <td>オリジナルデザイン+コーディング</td>
            <td>10〜30万円</td>
          </tr>
          <tr>
            <td>LP(ランディングページ)</td>
            <td>5〜30万円</td>
          </tr>
          <tr>
            <td>複雑なWebページ・システム連携あり</td>
            <td>20〜50万円以上</td>
          </tr>
        </table>
      </div>
      <p class="price__note">上の金額は目安です。ページ数や内容をうかがってから、お見積りをお出しします。</p>
      <p class="price__note">公開後のサーバー管理や修正をおまかせいただく場合は、月額5,000円〜(税込)の保守プランをご用意しています(ご希望の方のみ)。</p>
    </section>

    <section class="section" id="trust">
      <p class="section__label">TRUST</p>
      <h2 class="section__title">安心してご依頼いただくための、お約束</h2>
      <p class="section__lead">お金が関わることだからこそ、先に決めておく・正直に伝える、を大切にしています。</p>
      <ul class="cards cards--3">
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'document'])</div>
          <h3>先に見積書をお渡しします</h3>
          <p>内容・金額・納期・お支払い時期を書面(メール)で確認し、ご納得いただいてから着手します。</p>
        </li>
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'check'])</div>
          <h3>追加費用は先にご相談</h3>
          <p>見積書にない費用を、あとから請求しません。内容を追加するときは、先に金額をお伝えします。</p>
        </li>
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'yen'])</div>
          <h3>お支払いはわかりやすく</h3>
          <p>初期費用は手渡しまたはカード、月額はカードの自動決済。お支払い後は領収書を発行します。</p>
        </li>
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'person'])</div>
          <h3>顔の見えるひとり対応</h3>
          <p>最初から最後まで同じ私が担当し、連絡先と事業者情報を公開します。</p>
        </li>
        <li class="card">
          <div class="icon-circle">@include('partials.icon', ['name' => 'mail'])</div>
          <h3>個人情報は守ります</h3>
          <p>お預かりした情報は、ご返信とお見積りのためだけに使い、第三者に渡しません。</p>
        </li>
      </ul>
      <p class="trust__link"><a class="text-link" href="{{ route('tokushoho') }}">事業者情報(特定商取引法に基づく表記)・キャンセルと返金について →</a></p>
    </section>

    <section class="section" id="flow">
      <p class="section__label">FLOW</p>
      <h2 class="section__title">制作の流れ</h2>
      <ol class="cards cards--4 flow">
        <li class="card">
          <div class="icon-circle icon-circle--small flow__icon">@include('partials.icon', ['name' => 'chat'])</div>
          <span class="flow__step">STEP 1</span>
          <h3>ご相談</h3>
          <p>目的やご予算、ご希望をうかがいます。</p>
        </li>
        <li class="card">
          <div class="icon-circle icon-circle--small flow__icon">@include('partials.icon', ['name' => 'document'])</div>
          <span class="flow__step">STEP 2</span>
          <h3>お見積り</h3>
          <p>内容と費用、納期をお伝えします。</p>
        </li>
        <li class="card">
          <div class="icon-circle icon-circle--small flow__icon">@include('partials.icon', ['name' => 'pencil'])</div>
          <span class="flow__step">STEP 3</span>
          <h3>デザイン・制作</h3>
          <p>途中で確認していただきながら進めます。</p>
        </li>
        <li class="card">
          <div class="icon-circle icon-circle--small flow__icon">@include('partials.icon', ['name' => 'check'])</div>
          <span class="flow__step">STEP 4</span>
          <h3>確認・修正</h3>
          <p>仕上がりをご確認いただき、修正します。</p>
        </li>
        <li class="card">
          <div class="icon-circle icon-circle--small flow__icon">@include('partials.icon', ['name' => 'rocket'])</div>
          <span class="flow__step">STEP 5</span>
          <h3>公開・サポート</h3>
          <p>公開後のご質問にも対応します。</p>
        </li>
      </ol>
    </section>

    <section class="section" id="faq">
      <p class="section__label">FAQ</p>
      <h2 class="section__title section__title--icon">
        <span class="icon-circle icon-circle--small">@include('partials.icon', ['name' => 'question'])</span>よくある質問
      </h2>
      <div class="faq">
        <details>
          <summary>制作はひとりで行っていますか?</summary>
          <p>はい。ご相談から制作、公開後のご連絡まで、すべて私ひとりで担当します。</p>
        </details>
        <details>
          <summary>費用はどのくらいですか?</summary>
          <p>制作内容によって変わります。「<a href="#price">料金の目安</a>」をご覧ください。ページ数や内容をうかがってから、お見積りをお出しします。</p>
        </details>
        <details>
          <summary>制作期間はどのくらいですか?</summary>
          <p>ページ数や内容によって変わります。納期はお見積り時にお伝えします。</p>
        </details>
        <details>
          <summary>スマホでも見やすくなりますか?</summary>
          <p>はい。スマホでも見やすいように整えて制作します。</p>
        </details>
        <details>
          <summary>お支払いはいつ、どのようにしますか?</summary>
          <p>初期費用は手渡しまたはクレジットカード、月額(保守プラン)はクレジットカードの自動決済です。お支払い時期はお見積書に記載します。</p>
        </details>
        <details>
          <summary>見積もり以外の費用がかかることはありますか?</summary>
          <p>お見積書にない費用を、あとから請求することはありません。内容を追加したい場合は、先に金額をお伝えして、ご了承をいただいてから進めます。</p>
        </details>
        <details>
          <summary>やっぱりやめたい場合は、どうなりますか?</summary>
          <p>キャンセルと返金のルールは「<a href="{{ route('tokushoho') }}">事業者情報・お取引について</a>」にまとめています。ご契約の前にご確認ください。</p>
        </details>
        <details>
          <summary>公開後の修正はお願いできますか?</summary>
          <p>はい。公開後のサーバー管理や修正をおまかせいただける、月額5,000円〜(税込)の保守プランをご用意しています(ご希望の方のみ)。</p>
        </details>
      </div>
    </section>

    <section class="section contact" id="contact">
      <p class="section__label">CONTACT</p>
      <h2 class="section__title">まずはお気軽にご相談ください</h2>
      <ul class="contact__list">
        <li class="card contact__item">
          <div class="icon-circle">@include('partials.icon', ['name' => 'mail'])</div>
          <h3>フォームでご相談</h3>
          <p>お名前や連絡先を入力して送れます。</p>
          <a class="button" href="{{ route('contact') }}">お問い合わせフォーム</a>
        </li>
        <li class="card contact__item contact__item--line">
          <div class="icon-circle icon-circle--green">@include('partials.icon', ['name' => 'chat'])</div>
          <h3>LINEでご相談</h3>
          <p>気軽にメッセージを送れます。</p>
          <a class="button button--green" href="{{ route('line') }}">LINEでご相談する</a>
        </li>
      </ul>
      <p class="hours">
        <span class="icon-circle icon-circle--tiny">@include('partials.icon', ['name' => 'clock'])</span>
        <span class="hours__label">対応時間</span>
        <strong>{{ config('site.business_hours') }}</strong>
        <span class="hours__etc">など</span>
      </p>
      <p class="contact__note">ご相談の内容によっては、お受けできない場合もあります。あらかじめご了承ください。</p>
    </section>
  </div>
</main>

<footer class="footer">
  <div class="inner">
    <div class="footer__inner">
      <nav class="footer__nav">
        <a href="{{ route('tokushoho') }}">事業者情報・お取引について</a>
        <a href="{{ route('contact') }}#privacy">個人情報の取扱い</a>
      </nav>
      <p class="footer__copy">&copy; 2026 BLUE TAB ホームページ制作</p>
    </div>
  </div>
</footer>

<dialog class="lightbox" id="lightbox">
  <img class="lightbox__image" id="lightbox-image" src="" alt="" />
  <button class="lightbox__close" type="button" id="lightbox-close" aria-label="閉じる">&times;</button>
</dialog>

<script>
  (function () {
    var lightbox = document.getElementById('lightbox');
    var image = document.getElementById('lightbox-image');
    if (!lightbox.showModal) {
      return;
    }
    document.querySelectorAll('.works__zoom').forEach(function (link) {
      link.addEventListener('click', function (event) {
        event.preventDefault();
        var thumb = link.querySelector('img');
        image.src = link.href;
        image.alt = thumb.alt;
        lightbox.showModal();
      });
    });
    lightbox.addEventListener('click', function () {
      lightbox.close();
    });
  })();
</script>
@endsection
