<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Person\RepositoryPersonInterface;


class HelloController extends Controller
{
    public function __construct(RepositoryPersonInterface $person_repository)
    {
       $this->person_repository = $person_repository;
    }


    public function index()
    {
        $name = '鈴木太郎';
        $items = $this->person_repository->getFirstRecordByName($name);

        return view('hello.index', compact('items'));
    }
}
