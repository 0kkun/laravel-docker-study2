<?php

namespace App\Services\Person;

use Illuminate\Support\Collection;
use Carbon\Carbon;


Interface PersonServiceInterface
{
  /**
   * 30才以上のユーザーを返す
   * 
   * @return Collection
   */
  public function getAroundThirtyAge(): Collection;
}