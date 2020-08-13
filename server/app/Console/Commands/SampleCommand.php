<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SampleCommand {--sync : 同期実行}';

    /**
     * The console command description.
     *
     * @var string
     */
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
        Log::info("command:SampleCommand 実行開始");

        $is_sync = $this->option('sync'); // オプションをつけるとtrue返ってくる

        if($is_sync)
        {
            dd('同期実行開始');
            // dispatch_now("ジョブ");
        } else {
            dd('非同期実行開始');
            // dispatch("ジョブ");
        }

        Log::info("command:SampleCommand 実行終了");
    }

}
