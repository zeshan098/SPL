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
        'ytd_spb_rate', 'ytd_Sale', 'ytd_spb_c_y', 'ytd_ratio', 'duration_month', 't_coa',
        'concerned_zm', 'concerned_nsm', 'concerned_pm', 'current_case_handler','tot_proj_sum',
        'nsm_remarks', 'payment_person', 'nsm_last_visit_date', 'nsmccrsid', 'is_rejected_zm',
        'is_rejected_pm', 'is_rejected_nsm', 'is_completed', 'is_approved_zm', 'is_approved_pm',
        'is_approved_nsm', 'fmccrsid', 'pmccrsid', 'updated_by', 'zm_last_visit_date', 'zmccrsid',
        'zm_remarks', 'pm_remarks', 'approved_amount', 'current_biz_sum', 'proj_biz_sum',
        'tot_proj_sum', 'spb_sum', 'dr_address', 'dr_contact_number', 'is_fm_save_case', 'reference_number',
        'zm_visit_no_visit', 'qualification_id', 'verified_zm', 'zm_approved_date',
        'nsm_approved_date', 'pm_last_visit_date', 'accompanied_person_fm', 'accompanied_person_zm',
        'case_catagory', 'discription', 'dr_code'
    ];
}
