<?php

namespace App\Repositories\Person;

use App\Models\Person;

class RepositoryPerson implements RepositoryPersonInterface
{
    protected $person;

    /**
    * @param object $person
    */
    public function __construct(
        User $person
    )
    {
        $this->person = $person;
    }

    /**
     * 名前で1レコードを取得
     *
     * @var $name
     * @return object
     */
    public function getFirstRecordByName($name)
    {
        return $this->person->where('name', '=', $name)->first();
    }
}