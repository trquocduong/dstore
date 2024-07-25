<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'img',
        'price',
        'hide',
        'dacbiet',
        'view',
        'bestseller',
        'iddm',
        'quantity',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'iddm', 'id'); // 'iddm' is the foreign key in products table
    }

}
