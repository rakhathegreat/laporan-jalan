<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KondisiJalan extends Model
{
    use HasFactory;

    protected $table = 'kondisi_jalan';
    protected $guarded = [];
}
