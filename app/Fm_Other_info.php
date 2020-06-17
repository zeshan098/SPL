<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Fm_Other_info extends Model
{
    use Notifiable;
    public $table = "fm_other_infos";
    public $timestamps = false;

    protected $fillable = [
        'fm_team_info_id','fm_payment_infos_id','mother_language','other_language','caste','transport_type',
        'license','vehicle_no','political_affiliation','affiliation_with','family_depend_on',
        'present_company','gross_salary','benefits','reason_of_change','morning_evening_work',
        'pay_training_expense','suerty_bond','referred_by','interviewed_by','auth_by', 'city'
    ];
}
