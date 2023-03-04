<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_answer extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'ticket_name',
        'question',
        'answer'
    ];
    public function ticket(){
        return $this->belongsTo(Ticket::class,'ticket_name','ticket_name');
    }
}
