<?php

namespace App\Models\Backend;

use App\Models\Backend\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function service()
    {
       return $this->hasMany(Service::class);
    }
}
