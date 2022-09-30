<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
  use HasFactory;

     protected $fillable = [

        'users_id',
        'tabungans_id',
        'saldotarik',
        'saldoawal',
        'status',


    ];
     public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

     public function tabungan()
    {
        return $this->belongsTo(Tabungan::class, 'tabungans_id', 'id');
    }

     public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');

    }
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('l, d F Y');

    }

}
