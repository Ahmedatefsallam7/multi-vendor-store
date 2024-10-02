<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'slug',
        'description',
        'image',
        'status',
    ];

    public function parent() {
        return $this->belongsTo( Category::class, 'parent_id' )->withDefault( [
            'parent_id'=>null,
        ] );
    }

    public function children() {
        return $this->hasMany( Category::class, 'parent_id' );
    }
}
