<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    public $timestamps = false;
    protected $table = 'popup';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title','path','dateAjout','active'
    ];

}
