<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Retention_Unapproved_Product extends Model
{
    use Notifiable;
    public $table = "retention_unapproved_products";
    public $timestamps = false;
    protected $fillable = [
        'case_id','retention_id','product_name','total_biz_units','comments' ,
        'rate'
    ];
}
