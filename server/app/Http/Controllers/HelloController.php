<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\PersonRepository;


class HelloController extends Controller
{
    public function __construct(
        PersonRepository $person_repository
    )
    {
       $this->person_repository = $person_repository;
    }


    public function index()
    {
        $name = '鈴木太郎';
        $items = $this->person_repository->getFirstRecordByName($name);

        $all_items = $this->person_repository->getAll();

        return view('hello.index', compact('items','all_items'));
    }
}
