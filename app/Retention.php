<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Retention extends Model
{
    use Notifiable;
    public $table = "retentions";
    public $timestamps = false;
    protected $fillable = [
        'case_id','date_of_approval','project_duration','actual_duration',
        'projected_date_of_completion','actual_date_of_completion','total_spb_value',
        'pro_total_biz_units','total_biz_units_month','actual_total_biz_units','total_coa',
        'total_success','unapproved_total_biz_units'
    ];
}
