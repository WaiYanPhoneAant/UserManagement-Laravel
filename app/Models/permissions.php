<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'feature_id'
    ];
}
