<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $fillable = [
        "title",
        "description",
        "price",
        "command",
        "image",
        "is_rank",
    ];
}
