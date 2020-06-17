<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Escalation_Hierarcie extends Model
{
    use Notifiable; 
    public $table = "escalation_hierarchies";
    public $timestamps = false;
    
    protected $fillable = [
        'fmccrsid', 'zmccrsid', 'nsmccrsid', 'created_at', 'updated_at' 
    ];
}
