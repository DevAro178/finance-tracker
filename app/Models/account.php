<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
    public function recurring_transaction()
    {
        return $this->hasMany(recurring_transaction::class, 'account_id', 'id');
    }
    public function transaction()
    {
        return $this->hasMany(transaction::class, 'account_id', 'id');
    }
}
