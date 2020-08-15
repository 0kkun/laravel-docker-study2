<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface PersonRepository
{
    /**
     * Nameで1レコードを取得
     *
     * @var string $name
     * @return Collection
     */
    public function getFirstRecordByName(string $name): Collection;

    /**
     * 全レコードを取得
     *
     * @return Collection
     */  
    public function getAll(): Collection;

    /**
     * レコードを保存
     *
     */  
    public function createPerson($data): void;
}