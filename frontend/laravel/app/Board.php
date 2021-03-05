<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'board';
    protected $fillable = [
        'title' ,'color', 'status' , 'sequence'
    ];

    public function boardTask(){
        return $this->hasMany(BoardTask::class,'board_id','id');
    }
}
