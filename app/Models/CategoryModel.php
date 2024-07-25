<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'home',
        'ghichu',
        'hidden',
        'img',
    ];

    protected $attributes = [
        'hidden' => false,
    ];

    public function products()
    {
        return $this->hasMany(ProductsModel::class, 'iddm', 'id'); // 'iddm' is the foreign key in products table
    }

}
