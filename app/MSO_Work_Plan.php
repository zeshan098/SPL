<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MSO_Work_Plan extends Model
{
    use Notifiable; 
    public $table = "mso_work_plans";
    public $timestamps = false;
    
    protected $fillable = [
        'date', 'area', 'mso_id', 'contact_point', 'time', 'fm_id', 'status'
    ];
}
