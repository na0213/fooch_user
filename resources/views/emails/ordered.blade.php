<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p class="mb-4">{{ $item['store_name'] }}様の商品が注文されました。</p>

    <p>配送のご手配をお願いいたします。</p>

    <div class="mb-4">商品情報</div>
        <ul class="mb-4">
            <li>注文日：{{ now() }}</li>
            <li>商品名：{{ $item['name'] }}</li>
            <li>商品数：{{ $item['quantity'] }}</li>
            <li>商品金額：{{ $item['price'] }}円</li>
            <li>送料：{{ $item['shipping_fee'] }}円</li>
            <li>合計金額：{{ $item['price'] * $item['quantity'] + $item['shipping_fee'] }}円</li>
        </ul>

        <div class="mb-4">購入者情報</div>
        <ul>
            <li>ご注文者様氏名：{{ $user->name }} 様</li>
            <li>ご注文者様メールアドレス：{{ $user->email }}</li>
        </ul>

        <div class="mb-4">配送先</div>
        <ul>
            <li>配送先氏名：{{ $shipping_address['name'] }} 様</li>
            <li>配送先郵便番号：{{ $shipping_address['zipcode']}}</li>
            <li>配送先住所：{{ $shipping_address['prefecture'] }}{{ $shipping_address['city'] }}</li>
            <li>配送先電話番号：{{ $shipping_address['tel'] }}</li>
         <ul>

    <p>引き続きよろしくお願いいたします。</p>
    <p>{{ config('app.name') }}</p>
</body>
</html>