<?php

namespace App\Constants;

class Common
{
    const PRODUCT_ADD = '1';  //在庫追加
    const PRODUCT_REDUCE = '2';  //在庫削減

    //配列にする
    const PRODUCT_LIST = [
        'add' => self::PRODUCT_ADD,  //在庫追加
        'reduce' => self::PRODUCT_REDUCE  //在庫削減
    ];

    const ORDER_RECOMMEND = '0';
    const ORDER_HIGHER = '1';
    const ORDER_LOWER = '2';
    const ORDER_LATER = '3';
    const ORDER_OLDER = '4';

    const SORT_ORDER = [
        'recommend' => self::ORDER_RECOMMEND,
        'higherPrice' => self::ORDER_HIGHER,
        'lowerPrice' => self::ORDER_LOWER,
        'later' => self::ORDER_LATER,
        'older' => self::ORDER_OLDER
    ];

    const STATUS_RECEPT = '発送前';
    const STATUS_SENT = '発送済み';

    const STATUS_LIST = [
        'recept' => self::STATUS_RECEPT,
        'sent' => self::STATUS_SENT,
    ];

}