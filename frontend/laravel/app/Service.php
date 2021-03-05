<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $fillable = [
        'name', 'label' , 'status' , 'category_id' ,  'price'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
