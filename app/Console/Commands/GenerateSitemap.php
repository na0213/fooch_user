<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';
    // protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';
    // protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
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
        $sitemap->add(Product::all());

        // サイトマップをxmlへ書き込み
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
