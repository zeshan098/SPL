<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Fm_Relative_in_Pharma_info extends Model
{
    use Notifiable;
    public $table = "fm_relative_in_pharma_infos";
    public $timestamps = false;

    protected $fillable = [
        'fm_team_info_id','fm_payment_infos_id','fm_other_info_id','relationship','pharma_company'
    ];
}
