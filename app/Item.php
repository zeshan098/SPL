<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Notifiable; 
    public $table = "items";
    public $timestamps = false;
    
    protected $fillable = [
        'item_code', 'item_name', 'description', 'sale_price', 'mrp', 'finish_item_code',
        'date_con', 'user_name_con', 'lock_yn', 'brand_type_code', 'shipper_qty', 'reg_no',
        'moh', 'is_approved', 'is_deleted'
    ];
}
