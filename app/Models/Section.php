<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}

