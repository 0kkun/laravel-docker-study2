<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\PersonRepository;
use App\Services\Person\PersonServiceInterface;


class HelloController extends Controller
{

    private $person_repository;
    private $person_service;


    public function __construct(
        PersonRepository $person_repository,
        PersonServiceInterface $person_service
    )
    {
       $this->person_repository = $person_repository;
       $this->person_service = $person_service;
    }


    public function index()
    {
        $name = '鈴木太郎';
        $items = $this->person_repository->getFirstRecordByName($name);

        $all_items = $this->person_repository->getAll();

        $over_age_lists = $this->person_service->detective();



        return view('hello.index', compact('items','all_items', 'over_age_lists'));
    }
}
