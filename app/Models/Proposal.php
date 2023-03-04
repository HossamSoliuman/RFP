<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $fillable=[
        'ticket_name',
        'proposal',
        'comment',
        'request_review',
        'type',
        'is_approved'
    ];
}
