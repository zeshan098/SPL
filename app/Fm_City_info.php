<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Fm_City_info extends Model
{
    use Notifiable;
    public $table = "fm_personal_city_infos";
    public $timestamps = false;

    protected $fillable = [
        'fm_team_info_id','fm_payment_infos_id','fm_other_info_id','station_id'
    ];
}
