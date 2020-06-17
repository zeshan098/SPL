<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use Notifiable;
    public $table = "absents";
    public $timestamps = false;

    protected $fillable = [
        'absent_ccrsid', 'assign_ccrsid', 'from_date', 'to_date', 'date', 'admin_ccrsid' 
    ];
}
