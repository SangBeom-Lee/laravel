<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    //
    public function index()
    {
        return view('board.list');
    }

    public function write()
    {
        return view('board.write');
    }
}
