<!DOCTYPE html>
<html lang="ja">
<body>
    <p>お問合せありがとうございます。</p>
    <p>確認が取れ次第、ログインURLを発行し、以下ご登録のメールアドレスにご連絡いたします。</p><br>
    <p>お名前：{{ $name }}様</p>
    <p>メールアドレス：{{ $email }}</p>
    <p>商品内容：</p>
    <p>{{ $body }}</p><br>
    <p>万が一、１週間経っても連絡がない場合は、以下までお問合せください。</p>
    <p>fooch.info@gmail.com</p>
</body>
ご利用ありがとうございます。<br>
{{ config('app.name') }}
</html>