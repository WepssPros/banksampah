<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'products_id', 'transactions_id','tabungans_id', 'quantity'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function tabungan()
    {
        return $this->hasOne(Tabungan::class, 'id', 'tabungans_id');
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }
     public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

     public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');

    }

}
