<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $path = public_path('sitemap.xml');

        if (! file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);

        return new Response($file, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    // public function index()
    // {
        // $sitemap = Sitemap::create();
        
        // Topページ
        // $sitemap->add(Url::create(route('welcome'))
        //         ->setLastModificationDate(now())
        //         ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
        //         ->setPriority(1.0));

        // 記事一覧
        // $sitemap->add(Url::create(route('posts.index'))
        //     ->setLastModificationDate(now())
        //     ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
        //     ->setPriority(0.8));
       
        // 固定ページ
        // $sitemap->add(Url::create(route('about'))
        //     ->setLastModificationDate(now())
        //     ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     ->setPriority(0.5));

        // サイトマップをxmlへ書き込み
        // $sitemap->writeToFile(public_path('sitemap.xml'));

        // xmlを表示
        // return redirect('/sitemap.xml');
    // }
}
