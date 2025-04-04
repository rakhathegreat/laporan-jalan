<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Alamat extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'alamat';
    protected $guarded = [];
}
