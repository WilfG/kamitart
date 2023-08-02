<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'biderName',
        'biderPrice',
        'biderEmail',
        'event_id',
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
