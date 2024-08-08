<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table='users';
    protected $fillable = [
        'username',
        'email',
        'password',
        'diachi',
        'dienthoai',
        'role'
    ];
    public function GetAccount(){
        return self::$limit->get();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
