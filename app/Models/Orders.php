<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'madth', 'iduser', 'nguoidat_ten', 'nguoidat_email', 'nguoidat_tl',
        'nguoidat_diachi', 'nguoinhan_ten', 'nguoinhan_diachi', 'nguoinhan_tel',
        'total', 'ship', 'voucher', 'tongthanhtoan', 'pttt','status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function orderItems() {
        return $this->hasMany(OrdersItem::class);
    }
    public function product()
    {
        return $this->belongsTo(ProductsModel::class, 'product_id');
    }
    public function items()
    {
        return $this->hasMany(OrdersItem::class, 'orders_id'); // Đảm bảo 'order_id' là đúng
    }
}
