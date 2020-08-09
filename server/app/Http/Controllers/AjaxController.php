<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{

    /*
    * コントローラからビューにデータを渡し、それをJSが受け取り、
    * JSからコントローラに渡す。
    * さらにそれを受け取ったコントローラからJSのdoneにデータを送る
    */
    public function index()
    {
        $msg = 'This is ajax sample for post';

        // ビューに送り、ajaxに渡す用のデータ
        $send_to_ajax['status'] = "ajax status = OK!";
        $send_to_ajax['message'] = 'This message from ajax!';

        return view('ajax.index', compact('msg','send_to_ajax'));
    }

    public function ajax_post(Request $request)
    {
        // jsから受け取ったデータを変数に格納
        $response_to_js = $request->all();

        // ajax.jsのdoneのdataにjson形式で送る
        return response()->json($response_to_js);
    }
}
