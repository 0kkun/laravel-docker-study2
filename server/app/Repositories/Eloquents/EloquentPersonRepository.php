<?php

namespace App\Repositories\Eloquents;

use App\Models\Person;
use App\Repositories\Contracts\PersonRepository;
use Illuminate\Support\Collection;
use Carbon\Carbon;

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

    /**
     * レコード保存
     *
     * @var Collection $data
     * @return Collection
     */
    public function createPerson($data): void
    {
        // モデルインスタンスにはfillが使える
        $this->person_repository->fill([
            'name' => $data['name'],
            'age' => $data['age'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at'],
        ]);

        $this->person_repository->save();
    }
}