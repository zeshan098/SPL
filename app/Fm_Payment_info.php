<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Fm_Payment_info extends Model
{
    use Notifiable;
    public $table = "fm_payment_infos";
    public $timestamps = false;

    protected $fillable = [
        'fm_team_info_id','payment_type','payment_mode','category','emp_acc_no','bank_name',
        'branch_station','branch_address','transfer_from','no_of_letters'
    ];
}
