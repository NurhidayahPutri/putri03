<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    protected $table ='beli';
    protected $fillable = ['nobukti','idpem','tanggal','disc','ket'];
}
