<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_pembeli',
        'id_menu',
        'jumlah',
        'total_harga',
        'tanggal',
    ];

    // Relasi: Transaksi dimiliki oleh satu pembeli
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli');
    }

    // Relasi: Transaksi terkait dengan satu menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
