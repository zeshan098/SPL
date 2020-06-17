<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Su_Station extends Model
{
    use Notifiable; 
    public $table = "su_stations";
    public $timestamps = false;
    
    protected $fillable = [
        'station_id', 'station', 'station_code', 'teritory_code', 'sale_seq', 'order_seq_mso_hiraracy',
        'province' 
    ];
}
