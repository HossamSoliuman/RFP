<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function user(){
        return $this->hasOne(User::class);
    }
}
