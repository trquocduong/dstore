<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'orders_id', 'product_id', 'quantity', 'price'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'orders_id'); // Đảm bảo 'order_id' là đúng
    }
    

    public function product()
    {
        return $this->belongsTo(ProductsModel::class);
    }
}
