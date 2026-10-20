@extends('admin.layout')

@section('title', 'ページの内容を編集')

@section('content')
<h1 class="page-title">ページの内容を編集</h1>
<p class="page-lead">ここで保存した内容が、公開ページに反映されます。空欄の項目は、公開ページにオレンジ色の「入力してください」の枠が表示されます。</p>

@if (session('saved'))
<p class="admin-alert admin-alert--success" role="status">保存しました。</p>
@endif

@if ($errors->any())
<p class="admin-alert admin-alert--error" role="alert">保存できませんでした。赤字の項目をご確認ください。</p>
@endif

<form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data" novalidate>
  @csrf
  @method('PUT')

  <section class="admin-card">
    <div class="admin-card__head">
      <h2>トップページ:制作実績</h2>
      <a href="{{ route('home') }}#works" target="_blank" rel="noopener">公開ページを見る</a>
    </div>
    @include('admin.partials.image_field', ['key' => 'award_gold_image', 'label' => '金賞の賞状の写真', 'help' => 'JPEG・PNG・WebP、10MBまで。'])
    @include('admin.partials.image_field', ['key' => 'award_capcom_image', 'label' => 'カプコン賞の賞状の写真', 'help' => 'JPEG・PNG・WebP、10MBまで。'])
  </section>

  <section class="admin-card">
    <div class="admin-card__head">
      <h2>トップページ:お客さまの声</h2>
      <a href="{{ route('home') }}#works" target="_blank" rel="noopener">公開ページを見る</a>
    </div>
    @include('admin.partials.text_field', ['key' => 'voice_notice_strong', 'label' => '強調する文章(青い太字)'])
    @include('admin.partials.text_field', ['key' => 'voice_notice_body', 'label' => '続きの文章', 'multiline' => true, 'help' => '両方とも空欄にすると、この枠は表示されません。'])
  </section>

  <section class="admin-card">
    <div class="admin-card__head">
      <h2>LINEでご相談いただけます</h2>
      <a href="{{ route('line') }}" target="_blank" rel="noopener">公開ページを見る</a>
    </div>
    @include('admin.partials.text_field', ['key' => 'line_url', 'label' => 'LINEの友だち追加URL', 'type' => 'url', 'placeholder' => '例:https://line.me/R/ti/p/@xxxx', 'help' => 'URLを入れると、QRコードが自動で表示されます。スマホ向けの「LINEを開く」ボタンにも使います。'])
    @include('admin.partials.image_field', ['key' => 'line_qr_image', 'label' => 'QRコードの画像', 'help' => '画像を登録すると、自動のQRコードの代わりにこの画像を表示します。'])
  </section>

  <section class="admin-card">
    <div class="admin-card__head">
      <h2>事業者情報・お取引について</h2>
      <a href="{{ route('tokushoho') }}" target="_blank" rel="noopener">公開ページを見る</a>
    </div>
    @include('admin.partials.text_field', ['key' => 'owner_name', 'label' => '運営責任者', 'placeholder' => '本名を入力'])
    @include('admin.partials.text_field', ['key' => 'address', 'label' => '所在地', 'placeholder' => '住所を入力', 'help' => '住所を載せない場合は「ご請求があれば遅滞なく開示します」と入力する方法もあります。'])
    @include('admin.partials.text_field', ['key' => 'tel', 'label' => '電話番号', 'placeholder' => '電話番号を入力'])
    @include('admin.partials.text_field', ['key' => 'email', 'label' => 'メールアドレス', 'type' => 'email', 'placeholder' => 'メールアドレスを入力'])
    @include('admin.partials.text_field', ['key' => 'opened_on', 'label' => '開業日', 'placeholder' => '例:2026年4月1日開業', 'help' => '公開ページでは「個人事業主(開業届 提出済み・ここに入力した内容)」と表示されます。'])
    @include('admin.partials.text_field', ['key' => 'payment_timing', 'label' => 'お支払い時期', 'placeholder' => '例:ご契約時に50%、納品時に50%'])
    @include('admin.partials.text_field', ['key' => 'copyright', 'label' => '納品物の著作権', 'placeholder' => '例:お支払い完了後にお客さまへ譲渡します', 'help' => '公開ページでは「納品物の著作権は、ここに入力した内容。」と表示されます。'])
    @include('admin.partials.text_field', ['key' => 'cancel_deadline', 'label' => '保守プランの解約の申し出期限', 'placeholder' => '例:解約のお申し出は前月末までにお願いします。', 'help' => '「保守プランは、いつでも解約できます。」の後ろに続けて表示されます。'])
    @include('admin.partials.text_field', ['key' => 'cancel_policy', 'label' => 'キャンセルと返金について', 'multiline' => true, 'rows' => 5, 'help' => '1行が箇条書きの1項目になります。'])
    <label class="admin-check">
      <input type="checkbox" name="cancel_policy_confirmed" value="1" {{ old('cancel_policy_confirmed', $settings['cancel_policy_confirmed']) ? 'checked' : '' }} />
      内容を確認した(公開ページの「以下は案です。」の表示を消す)
    </label>
  </section>

  <section class="admin-card">
    <div class="admin-card__head">
      <h2>お問い合わせフォーム</h2>
      <a href="{{ route('contact') }}" target="_blank" rel="noopener">公開ページを見る</a>
    </div>
    @include('admin.partials.text_field', ['key' => 'contact_mail_to', 'label' => 'お問い合わせの送信先メールアドレス', 'type' => 'email', 'placeholder' => '例:info@example.com', 'help' => '「お問い合わせ送信」が押されると、入力内容がこのアドレスにメールで届きます。空欄にするとメールは送られません(お問い合わせの内容はデータベースには保存されます)。'])
  </section>

  <div class="admin-actions">
    <button class="button" type="submit">保存する</button>
  </div>
</form>
@endsection
