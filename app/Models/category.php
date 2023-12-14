<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function recurring_transaction()
    {
        return $this->hasMany(recurring_transaction::class, 'category_id', 'id');
    }
    public function transaction()
    {
        return $this->hasMany(transaction::class, 'category_id', 'id');
    }
}
