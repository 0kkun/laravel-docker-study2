<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AjaxController extends Controller
{
    private $test;

    public function index()
    {
        $msg = 'show people record';
        $test = 'プライベート';

        return view('ajax.index', [ 'msg' => $msg, 'test'=>$test ]);
    }

    public function ajax_post(Request $request)
    {
        $response = array();
        $response["status"] = "ajax status = OK!";
        $response["message"] = 'This message from ajax!';
        return response()->json($response);
    }
}
