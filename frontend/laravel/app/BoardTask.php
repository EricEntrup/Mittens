<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardTask extends Model
{
    protected $table = 'board_task';
    protected $fillable = [
        'board_id' , 'name' , 'description' , 'priority' ,  'date'
    ];

}
