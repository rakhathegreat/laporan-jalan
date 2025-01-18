<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataJalan extends Model
{
    use HasFactory;

    protected $tabel = 'data_jalans';
    protected $guard = [];
}
