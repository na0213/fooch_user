<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';
    // protected $description = 'Command description';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Topページ
        $sitemap->add(Url::create(route('welcome'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
            ->setPriority(1.0));

        // 商品一覧
        $sitemap->add(Url::create(route('top.index'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));

        // 商品詳細
        Product::all()->each(function ($product) use ($sitemap) {
            $sitemap->add(Url::create(route('top.show', $product))
                ->setLastModificationDate($product->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.5));
        });

        $sitemap->add(Url::create(route('top.store'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.5));

        $sitemap->add(Url::create(route('top.whatis'))
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
        ->setPriority(1.0));

        $sitemap->add(Url::create(route('top.owner_contact'))
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
        ->setPriority(1.0));

        $sitemap->add(Url::create(route('terms'))
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.5));

        $sitemap->add(Url::create(route('legal'))
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.5));

        // サイトマップをxmlへ書き込み
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
