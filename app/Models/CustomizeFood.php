<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomizeFood extends Model
{
    use HasFactory;
    protected $table = 'customize_foods';
    protected $guarded=[];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
