<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AjaxController extends Controller
{
    private $test;

    public function index()
    {
        $msg = 'This is ajax sample for post';

        $response_for_ajax = array();
        $response_for_ajax["status"] = "ajax status = OK!";
        $response_for_ajax["message"] = 'This message from ajax!';


        return view('ajax.index', compact('msg','test','response_for_ajax'));
    }

    public function ajax_post(Request $request)
    {
        // 配列に格納し、index.blade.phpにjson形式で送る
        // array = [ status => "", message => "" ]
        $response = array();
        $response["status"] = "ajax status = OK!";
        $response["message"] = 'This message from ajax!';
        return response()->json($response);
    }
}
