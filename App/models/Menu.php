<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $fillable = ['nama_menu', 'harga', 'stok'];

    // Relasi: Menu punya banyak transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_menu');
    }
}
