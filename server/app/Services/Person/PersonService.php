<?php

namespace App\Services\Person;

use App\Repositories\Contracts\PersonRepository;
use Illuminate\Support\Collection;

class PersonService implements PersonServiceInterface
{

  private $person_repository;

  /**
   * PersonService constoractor
   * 
   * @param PersonRepository $person_repository
   */
  public function __construct(
    PersonRepository $person_repository
  )
  {
    $this->person_repository = $person_repository;
  }

  /**
   * 30才以上のユーザーを返す
   * 
   * @return Correction
   */
  public function getAroundThirtyAge(): Collection
  {
    $people = $this->person_repository->getAll();
    $people = $people->where('age', '>=', 30);
    return $people;
  }

}