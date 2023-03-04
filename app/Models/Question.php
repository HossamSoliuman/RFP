<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable=[
        'question',
        'number',
        'solution_id',
        'answer_type'
    ];
    public function option(){
        return $this->hasMany(Option::class);
    }
}
