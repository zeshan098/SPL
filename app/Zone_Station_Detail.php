<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Zone_Station_Detail extends Model
{
    use Notifiable; 
    public $table = "zone_station_details";
    public $timestamps = false;
    
    protected $fillable = [
        'ccrsid', 'team', 'zone', 'district', 'station', 'role', 'created_at', 'updated_at'
    ];
}
