<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomizeDecoration extends Model
{
    use HasFactory;
    protected $table = 'customize_decorations';
    protected $guarded=[];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
