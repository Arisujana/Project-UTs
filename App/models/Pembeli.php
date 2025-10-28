<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = 'pembeli';

    protected $fillable = ['nama', 'telepon', 'alamat'];

    // Relasi: Pembeli punya banyak transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pembeli');
    }
}
