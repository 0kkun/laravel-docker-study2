<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade;
use Goutte;
use Illuminate\Support\Facades\Log;

class ScrapingRanking extends Command
{

    protected $signature = 'command:scrapingRanking {--sync : 同期実行}';

    protected $description = '[Ranking] スクレイピング実行コマンド';

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

        $goutte = GoutteFacade::request('GET', 'https://sportsnavi.ht.kyodo-d.jp/tennis/ranking/atp/point/');

        echo '-----------------------------------------------------' . "\n";

        $goutte->filter('tbody')->each(function ($node) {
            $node->filter('tr')->each(function ($tr) {
                echo 'rank : ' . $tr->filter('p')->text() . "\n";
                echo 'player_name : ' . $tr->filter('a')->text() . "\n";
                echo 'link : ' . 'https:/' . $tr->filter('a')->attr('href') . "\n";
            });
        });

        echo '-----------------------------------------------------' . "\n";

        
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
