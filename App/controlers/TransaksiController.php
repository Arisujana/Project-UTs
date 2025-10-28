<?php
namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Pembeli;
use App\Models\Menu;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $transaksi = Transaksi::with('pembeli', 'menu')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('pembeli', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                })->orWhereHas('menu', function ($q) use ($search) {
                    $q->where('nama_menu', 'like', '%' . $search . '%');
                });
            })->paginate(5);
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $pembeli = Pembeli::all();
        $menu = Menu::all();
        return view('transaksi.create', compact('pembeli', 'menu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pembeli' => 'required|exists:pembeli,id',
            'id_menu' => 'required|exists:menu,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $menu = Menu::find($request->id_menu);
        $total_harga = $request->jumlah * $menu->harga;

        Transaksi::create([
            'id_pembeli' => $request->id_pembeli,
            'id_menu' => $request->id_menu,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load('pembeli', 'menu');
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $pembeli = Pembeli::all();
        $menu = Menu::all();
        return view('transaksi.edit', compact('transaksi', 'pembeli', 'menu'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'id_pembeli' => 'required|exists:pembeli,id',
            'id_menu' => 'required|exists:menu,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $menu = Menu::find($request->id_menu);
        $total_harga = $request->jumlah * $menu->harga;

        $transaksi->update([
            'id_pembeli' => $request->id_pembeli,
            'id_menu' => $request->id_menu,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}