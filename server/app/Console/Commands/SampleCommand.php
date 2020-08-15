<?php

namespace App\Console\Commands;

use App\Jobs\SampleJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SampleCommand extends Command
{
    protected $signature = 'command:SampleCommand {--sync : 同期実行}';

    protected $description = 'サンプルで作ったコマンド';

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
        Log::info("command:SampleCommand 実行"); // ログファイルに表示される文字
        $this->info("コマンド実行"); //ターミナルで表示される文字

        $is_sync = $this->option('sync'); // オプションをつけるとtrue返ってくる

        if($is_sync)
        {
            Log::info('同期実行開始');
            dispatch_now(new SampleJob);
        } else {
            Log::info('非同期実行開始');
            dispatch(new SampleJob);
        }

        Log::info("command:SampleCommand 実行終了");
        $this->info("コマンド終了");
    }

}
