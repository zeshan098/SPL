<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Item_Team extends Model
{
    use Notifiable; 
    public $table = "items_teams";
    public $timestamps = false;
    
    protected $fillable = [
        'item_code', 'team_id', 'year_id', 'lock_yn', 'item_code_ps', 'product_family',
        'maj_prd_share', 'item_seq_no' 
    ];
}
