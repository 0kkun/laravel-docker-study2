<?php

namespace App\Repositories\Eloquents;

use App\Models\Person;
use App\Repositories\Contracts\PersonRepository;
use Illuminate\Support\Collection;

class EloquentPersonRepository implements PersonRepository
{
    protected $person_repository;

    /**
    * @param object $person
    */
    public function __construct(
        Person $person_repository
    )
    {
        $this->person_repository = $person_repository;
    }

    /**
     * 名前で1レコードを取得
     *
     * @var string $name
     * @return Collection
     */
    public function getFirstRecordByName(string $name): Collection
    {
        return $this->person_repository
                    ->where('name', '=', $name)
                    ->get();
    }

    public function getAll(): Collection
    {
        return $this->person_repository
                    ->get();
    }
}