<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Portofolio;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function portofolios(): HasMany
    {
        return $this->hasMany(Portofolio::class, 'category_id', 'id');
    }
}
