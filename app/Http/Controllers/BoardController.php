<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class BoardController extends Controller
{
    // 게시글 리스트
    public function index(Request $request)
    {
        $param                                              = explode("/", $request->path());

        $board_name                                         = $param[1];
        $board_config                                       = DB::table('board')->where('title', $board_name);
        $board_data                                         = DB::table('board_data')->where('board_name', $board_name)->paginate(1);

        return view('board.index', array(
            'name'                                          => $board_name,
            'config'                                        => $board_config,
            'data'                                          => $board_data,
            'param'                                         => $param
        ));
    }

    // 게시글 작성 및 수정
    public function write()
    {
        $_Board                                             = new Board();
        $data                                               = $_Board->getBaseBoardData();

        return view('board.write', array(
            'data'                                          => $data
        ));
    }

    // 게시글 보기
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

    // 게시글 저장
    public function postSave(Request $request)
    {
        // 필수문구 체크
        $request->validate([
            'title'                                         => 'required|string|max:255',
            'content'                                       => 'required|string|'
        ]);

        $board                                              = Board::create([
            'title'                                         => $request->title,
            'content'                                       => $request->content
        ]);

        // 게시판 리스트로 이동
        $param                                              = explode("/", $request->path());

        $board_name                                         = $param[1];
        $board_config                                       = DB::table('board')->where('title', $board_name);
        $board_data                                         = DB::table('board_data')->where('board_name', $board_name)->paginate(1);


        return view('board.index', array(
            'name'                                          => $board_name,
            'config'                                        => $board_config,
            'data'                                          => $board_data,
            'param'                                         => $param
        ));
    }

    // 게시글 수정
    public function postEdit(Request $request)
    {

    }

    // 게시글 삭제
    public function postDel(Request $request)
    {

    }
}
