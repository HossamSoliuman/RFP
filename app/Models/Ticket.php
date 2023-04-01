<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'ticket_name',
        'sales_id',
        'presales_id',
        'ticket_status'
    ];
    public function request(){
        return $this->hasOne(Request::class,'ticket_name','ticket_name');
    }
    public function request_answer(){
        return $this->hasMany(Request_answer::class,'ticket_name','ticket_name');
    }
    public function proposal(){
        return $this->hasMany(Proposal::class,'ticket_name','ticket_name');
    }
    public function sales(){
        return $this->belongsTo(User::class,'sales_id','id');
    }
    public function presales(){
        return $this->belongsTo(User::class,'presales_id','id');
    }
    
    
}
