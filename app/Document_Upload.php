<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Document_Upload extends Model
{
    use Notifiable;
    public $table = "document_uploads";

    protected $fillable = [
        'case_id', 'image_path'
    ];
}
