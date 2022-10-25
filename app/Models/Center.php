<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $table = 'centers';

    protected $fillable = [
        'name', 'description', 'avatar_path', 'fanpage', 'website', 'fee_percent', 'url_show_classes'
    ];

    function classes()
    {
        return $this->hasMany(MClass::class);
    }
}
