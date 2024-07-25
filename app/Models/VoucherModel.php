<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherModel extends Model
{
    use HasFactory;
    protected $table = 'vouchers';
    public function getVourchers(){
        return self::$limit->get();
    }
}
