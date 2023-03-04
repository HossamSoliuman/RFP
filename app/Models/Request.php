<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    

    use HasFactory;
    protected $fillable=[
        'cname',
        'cphone',
        'cemail',
        'caddress',
        'pname',
        'ptitle',
        'cr',
        'gosi',
        'ticket_name'
    ];
    public function ticket(){
        return $this->belongsTo(Ticket::class,'ticket_name','ticket_name');
    }
}
