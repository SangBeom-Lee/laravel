<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $table                                        = 'board_data';

    public function getBaseBoardData()
    {
        $data                                               = (object) array();
        $data->title                                        = "";
        $data->content                                      = "";

        return $data;
    }
}
