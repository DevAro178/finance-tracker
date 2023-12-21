<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $fillable = [
        'name',
        'type',
        'balance',
        'user_id',
        'icon',
    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
    public function transaction()
    {
        return $this->hasMany(transaction::class, 'account_id', 'id');
    }
}
