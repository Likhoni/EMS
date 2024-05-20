<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Event;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_service extends Model
{
    use HasFactory;
    protected $table = 'package_service';
    protected $guarded=[];


    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class,'event_id');
    }
}
