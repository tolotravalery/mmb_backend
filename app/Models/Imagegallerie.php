<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagegallerie extends Model
{
    protected $table = 'imagegalleries';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'number','path','galleries_id'
    ];

    public function gallerie()
    {
        return $this->belongsTo('App\Models\Gallerie');
    }

}
