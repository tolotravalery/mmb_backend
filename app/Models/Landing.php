<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $table = 'landings';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title','image_cn','image_en','active','date_landing'
    ];
}
