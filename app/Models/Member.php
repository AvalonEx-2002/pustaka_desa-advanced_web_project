<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icNumber', 'address', 'phoneNumber'];

    public function borrowRecords () {
        return $this->hasMany(BorrowRecord::class);
    }
}
