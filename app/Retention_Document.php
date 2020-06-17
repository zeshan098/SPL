<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Retention_Document extends Model
{
    use Notifiable;
    public $table = "retention_documents";
    public $timestamps = false;

    protected $fillable = [
        'case_id', 'image_path'
    ];
}