<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p class="mb-4">{{ $item['store_name'] }}様の商品が注文されました。</p>

    <p>配送のご手配をお願いいたします。</p><br>

    <div class="mb-4">ご注文内容</div>
        <p>注文日：{{ now() }}</p>
        <p>商品名：{{ $item['name'] }}</p>
        <p>商品数：{{ $item['quantity'] }}</p>
        <p>商品金額：{{ $item['price'] }}円</p>
        <p>送料：{{ $item['shipping_fee'] }}円</p>
        <p>合計金額：{{ $item['price'] * $item['quantity'] + $item['shipping_fee'] }}円</li><br>

        <div class="mb-4">配送先</div>
        <p>{{ $shipping_address['name'] }} 様</p>
        <p>〒{{ $shipping_address['zipcode'] }}</p>
        <p>{{ $shipping_address['prefecture'] }}{{ $shipping_address['city'] }}</p>
        <p>電話番号: {{ $shipping_address['tel'] }}</p><br>
        {{-- <ul>
            <li>{{ $shipping_address['name'] }} 様</li>
            <li>配送先郵便番号：{{ $shipping_address['zipcode']}}</li>
            <li>配送先住所：{{ $shipping_address['prefecture'] }}{{ $shipping_address['city'] }}</li>
            <li>配送先電話番号：{{ $shipping_address['tel'] }}</li>
         <ul> --}}

    <p>引き続きよろしくお願いいたします。</p>
    <p>{{ config('app.name') }}</p>
</body>
</html>