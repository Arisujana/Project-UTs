<?php
namespace App\Http\Controllers;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $pembeli = Pembeli::when($search, function ($query) use ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        })->paginate(5);
        return view('pembeli.index', compact('pembeli'));
    }

    public function create()
    {
        return view('pembeli.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);
        Pembeli::create($request->all());
        return redirect()->route('pembeli.index')->with('success', 'Pembeli berhasil ditambahkan');
    }

    public function show(Pembeli $pembeli)
    {
        return view('pembeli.show', compact('pembeli'));
    }

    public function edit(Pembeli $pembeli)
    {
        return view('pembeli.edit', compact('pembeli'));
    }

    public function update(Request $request, Pembeli $pembeli)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);
        $pembeli->update($request->all());
        return redirect()->route('pembeli.index')->with('success', 'Pembeli berhasil diupdate');
    }

    public function destroy(Pembeli $pembeli)
    {
        $pembeli->delete();
        return redirect()->route('pembeli.index')->with('success', 'Pembeli berhasil dihapus');
    }
}