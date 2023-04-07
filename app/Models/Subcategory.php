<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subCategory_name',
        'category_name',
        'category_id',
        'slug',

    ];

    protected $rules = [
        'name' => 'required|max:255',
        'category_name'=>'required|max:255',
        'category_id' => 'required',
        'slug' => 'required|max:255',

    ];

}
