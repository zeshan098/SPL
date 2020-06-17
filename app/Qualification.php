<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use Notifiable;
    public $table = "qualifications";

    protected $fillable = [
        'designation', 'desig_full_name'
    ];
}
