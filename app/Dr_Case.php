<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Dr_Case extends Model
{
    use Notifiable;
    public $table = "dr_cases";

    protected $fillable = [
        'team', 'zone', 'district', 'station', 'dr_name', 'hospital_name', 'pharmacy_name', 
        'discount_details', 'dr_designation', 'salutation', 'salutation_specify',
        'ppb', 'last_visit_date', 'case_type', 'committed_biz', 'actual_biz',
        'spb_amt', 'committed_time', 'actual_time', 'coa', 'success', 'activity_name',
        'ytd_spb_rate', 'ytd_Sale', 'ytd_spb_c_y', 'ytd_ratio', 'duration_month', 't_coa'
    ];
}
