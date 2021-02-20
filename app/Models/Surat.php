<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model

{	 protected $fillable = [
        'jenis_surat',
        'user_id',
        'tgl_terima',
        'no_agenda',
        'tujuan',
        'tgl_surat',
        'no_surat',
        'file_lampiran',
        'perihal',
        'asal_surat',
        'deskripsi',
        'file_surat'
    ];

    use HasFactory;
}
