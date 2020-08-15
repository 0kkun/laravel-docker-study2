<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Repositories\Contracts\PersonRepository;
use Carbon\Carbon;

class SampleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $person_repository;
    private $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        PersonRepository $person_repository
    )
    {
        $this->person_repository = $person_repository;

        $today = Carbon::now();

        $data=collect([
            'name'=>'Job',
            'age'=>30,
            'created_at' => $today,
            'updated_at' => $today
        ]);

        $this->person_repository->createPerson($data);
    }
}
