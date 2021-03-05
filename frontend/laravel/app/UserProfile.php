<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $fillable = [
        'user_id', 'gender', 'dob', 'address', 'pincode'
    ];


    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
