<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'status',
    ];

    protected $rules = [
        'name' => 'required|max:255',
        'slug' => 'required|unique:subcategories,slug|max:255',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|in:active,inactive',
    ];

}
