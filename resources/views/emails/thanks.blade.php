<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>{{ $user->name }} 様,</p>

    <p>下記のご注文ありがとうございました。発送までしばらくお待ちください。</p>

    @foreach ($purchasedItems as $item)
        <p>購入内容:</p>
        <p>店舗名: {{ $item['store_name'] }}</p>
        <p>商品名: {{ $item['name'] }}</p>
        <p>購入数量: {{ $item['quantity'] }}</p>
        <p>金額: {{ $item['price'] * $item['quantity'] }} 円</p>
        <hr>
    @endforeach

    <p>配送先:</p>
    <p>〒{{ $shipping_address['name'] }}</p>
    <p>〒{{ $shipping_address['zipcode'] }}</p>
    <p>{{ $shipping_address['prefecture'] }}{{ $shipping_address['city'] }}</p>
    <p>電話番号: {{ $shipping_address['tel'] }}</p>
    
    <p>引き続きよろしくお願いいたします。</p>
    <p>{{ config('app.name') }}</p>
</body>
</html>