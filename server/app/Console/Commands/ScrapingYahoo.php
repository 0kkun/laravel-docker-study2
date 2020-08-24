<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade;
use Goutte;
use Illuminate\Support\Facades\Log;

class ScrapingYahoo extends Command
{

    protected $signature = 'command:scrapingYahoo {--sync : 同期実行}';

    protected $description = '[Yahooスポーツナビ] スクレイピング実行コマンド';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('実行');

        $goutte = GoutteFacade::request('GET', 'https://sports.yahoo.co.jp/news/list?id=tennis');

        echo '-----------------------------------------------------' . "\n";

        $goutte->filter('.textNews')->each(function ($node) {
            echo 'タイトル : ' . $node->filter('.articleTitle')->text() . "\n";
            echo 'リンク : ' . $node->filter('.articleUrl')->attr('href') . "\n";
        });

        echo '-----------------------------------------------------' . "\n";
        Log::info('実行終了');
        
        /**
         * memo
         * ->getUri()       最後にたどり着いたURL
         * ->text()         テキストのみ取得
         * ->first()        一番最初のを取得
         * ->html()         HTMLを取得
         * ->attr('href')   属性を取得
         * 
         * 
         */

    }
}
