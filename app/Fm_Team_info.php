<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Fm_Team_info extends Model
{
    use Notifiable;
    public $table = "fm_team_infos";
    public $timestamps = false;

    protected $fillable = [
        'company','employee_name','father_name','dob','joining_date','eobi_join_date','eobi',
        'age','gender', 'cnic_no','permanent_address','temporary_address','current_address',
        'postal_code','email','department','function_name','concerned_manager','team','zone',
        'station', 'district','ccrsid',
        'designation','employee_type','confirm_date','applied_for_job','comments','attandance_id',
        'emp_no','mobile_no','emergency_ph_no','residence_ph_no','company_ph_no','contact_person',
        'martial_status','no_of_children','above_5_year','blood_group','religion','speify_other',
        'service_type','is_manager','created_at','is_deleted'
    ];
}
