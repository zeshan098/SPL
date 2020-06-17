<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use Notifiable;
    

    protected $fillable = [
        'product', 'spb_amt', 'current_biz', 'proj_biz', 'tot_proj', 'cost_of_activity',
        'rate'
    ];
}
