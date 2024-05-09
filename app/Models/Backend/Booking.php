<?php

namespace App\Models\Backend;

use App\Models\Backend\Event;
use App\Models\Backend\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function event()
    {
       return $this->belongsTo(Event::class); 
    }

    public function service()
    {
       return $this->hasMany(Service::class);
    }
}
