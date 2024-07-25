<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewModel extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'img',
        'title',
        'mota', 
        'hienthi'

    ];
    public function getNew(){
        return self::$limit->get();
    }
}
