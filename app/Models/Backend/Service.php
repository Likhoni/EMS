<?php

namespace App\Models\Backend;

use App\Models\Backend\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function event()
 {
    return $this->belongsTo(Event::class);
 }
}



