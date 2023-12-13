<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    public function account()
    {
        return $this->belongsTo(account::class, 'account_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}