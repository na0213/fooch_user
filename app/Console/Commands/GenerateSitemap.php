<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
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

        // 記事一覧
        // $sitemap->add(Url::create(route('posts.index'))
        //     ->setLastModificationDate(now())
        //     ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
        //     ->setPriority(0.8));

        // 記事詳細
        // $sitemap->add(Post::all());

        // 固定ページ
        // $sitemap->add(Url::create(route('about'))
        //     ->setLastModificationDate(now())
        //     ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     ->setPriority(0.5));

        // サイトマップをxmlへ書き込み
        $sitemap->writeToFile(public_path('sitemap.xml'));
    // }
        // return Command::SUCCESS;
    }
}
