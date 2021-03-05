<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = "appointment";
    protected $fillable = [ 'category_id','service_id','user_id', 'price' ,'name','email','contact_number','date','time' ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
