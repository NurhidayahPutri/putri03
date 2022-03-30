<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table ='mutasi';
    protected $fillable = ['nb','idbarang','qty','harga',];
}
