<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Retention_Approved_Product extends Model
{
    use Notifiable;
    public $table = "retention_approved_products";
    public $timestamps = false;
    protected $fillable = [
        'case_id','retention_id','product_name','spb_value','biz_units_month','actual_biz_unit',
        'biz_units','coa','success', 'rate'
    ];
}
