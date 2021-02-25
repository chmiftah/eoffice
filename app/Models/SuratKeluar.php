<?php

namespace App\Models;
use App\Models\SuratKeluarStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function SuratKeluarStatus()
    {
        return $this->hasOne(SuratKeluarStatus::class ,'surat_keluar_id');
    }
}
