<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function transactionDetails() {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
}
