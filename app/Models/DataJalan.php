<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Alamat;

class DataJalan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'data_jalan';
    protected $guarded = [];
    protected $fillable = [
        'nama',
        'panjang',
        'lebar',
        'kondisi_jalan_id',
        'keterangan',
        'alamat_id',
    ];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }

    public function kondisi_jalan()
    {
        return $this->belongsTo(KondisiJalan::class);
    }
}
