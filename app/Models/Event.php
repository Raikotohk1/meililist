<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'description', 'event_date', 'location', 'dance'];

    public function responses()
    {
        return $this->hasMany(Response::class);
    } 
    
    public function isFutureEvent()
    {
        return strtotime($this->event_date) > time();
    }

    public function isPastEvent()
    {
        return strtotime($this->event_date) < time();
    }
}
