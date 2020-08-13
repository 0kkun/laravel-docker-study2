<?php

namespace App\Repositories\Person;

use Illuminate\Support\Collection;

interface RepositoryPersonInterface
{
    /**
     * Nameで1レコードを取得
     *
     * @var string $name
     * @return Collection
     */
    public function getFirstRecordByName(string $name): Collection;
}