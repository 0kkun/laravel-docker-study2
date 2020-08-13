<?php

namespace App\Repositories\Person;

interface RepositoryPersonInterface
{
    /**
     * Nameで1レコードを取得
     *
     * @var string $name
     * @return object
     */
    public function getFirstRecordByName($name);
}