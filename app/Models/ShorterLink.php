<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShorterLink extends Model
{
    protected $fillable = [
        'link',
        'code',
        'visit_count'
    ];
}
