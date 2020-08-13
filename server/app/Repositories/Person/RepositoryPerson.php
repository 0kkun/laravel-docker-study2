<?php

namespace App\Repositories\Person;

use App\Models\Person;
use Illuminate\Support\Collection;

class RepositoryPerson implements RepositoryPersonInterface
{
    protected $person;

    /**
    * @param object $person
    */
    public function __construct(
        Person $person
    )
    {
        $this->person = $person;
    }

    /**
     * 名前で1レコードを取得
     *
     * @var string $name
     * @return Collection
     */
    public function getFirstRecordByName(string $name): Collection
    {
        return $this->person
                    ->where('name', '=', $name)
                    ->get();
    }
}