<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'categories';
    protected $with = 'categories';
    protected $fillable = [
        'id',
        'name',
        'description',
        'category_id',
        'store_id',
    ];

    public function categories()
    {
        return $this->hasMany(self::class);
    }

    public function category()
    {
        return $this->belongsTo(self::class);
    }
}
