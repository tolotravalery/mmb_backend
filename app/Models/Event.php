<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    protected $table = 'events';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name_en','name_cn','text_en','text_cn', 'display_date_en', 'display_date_cn', 'sort_date', 'promoted','path','path2','etype'
    ];
}
