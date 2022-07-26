<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    //
    public function index()
    {
        $board_name                                         = "notice";
        $board_config                                       = DB::table('board')->where('title', $board_name);
        $board_data                                         = DB::table('board_data')->where('board_name', $board_name)->paginate(1);

        return view('board.index', array(
            'name'                                          => $board_name,
            'config'                                        => $board_config,
            'data'                                          => $board_data
        ));
    }

    public function write()
    {
        return view('board.write');
    }

    public function view(Request $request)
    {
        $param                                              = explode("/", $request->path());
        $board_id                                           = $param[2];

        $board_name                                         = "notice";
        $board_config                                       = DB::table('board')->where('title', $board_name);
        $board_data                                         = DB::table('board_data')->find($board_id);

        return view('board.view', array(
            'name'                                          => $board_name,
            'config'                                        => $board_config,
            'data'                                          => $board_data
        ));  
    }
}
