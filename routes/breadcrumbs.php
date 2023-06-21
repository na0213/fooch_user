<?php

// ホーム
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('dashboard'));
});

// ホーム > 商品一覧
Breadcrumbs::for('items.index', function ($trail) {
    $trail->parent('home');
    $trail->push('商品一覧', route('items.index'));
});

// ホーム > 商品一覧 > [カテゴリー名]
Breadcrumbs::for('items.category', function ($trail, $category) {
    $trail->parent('items.index');
    $trail->push($category, route('items.category', $category));
});

// ホーム > 商品一覧 > [カテゴリー名] > [商品名]
Breadcrumbs::for('items.show', function ($trail, $category, $product) {
    $trail->parent('items.category', $category);
    $trail->push($product->name, route('items.show', $product));
});
