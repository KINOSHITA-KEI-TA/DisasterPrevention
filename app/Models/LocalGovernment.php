<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalGovernment extends Model
{
    use HasFactory;

    protected $fillable = ['local_government_code', 'name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
