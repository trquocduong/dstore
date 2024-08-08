<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherModel extends Model
{
    use HasFactory;
    protected $table = 'vouchers';
    public function getVourchers(){
        return self::$limit->get();
    }
    public function isValid()
    {
        // Example validation logic
        $currentDate = Carbon::now();
        return $this->status === 'active' && $this->expiry_date >= $currentDate;
    }
}
