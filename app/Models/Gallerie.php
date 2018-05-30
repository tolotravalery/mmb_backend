<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallerie extends Model
{
    protected $table = 'galleries';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title','type'
    ];

    public function imagegalleries()
    {
        return $this->hasMany('App\Models\Imagegallerie');
    }
}
