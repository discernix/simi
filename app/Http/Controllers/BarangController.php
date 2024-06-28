<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    public function index()
    {
        return view('barang.index', [
            'title' => 'Barang',
            'data' => Barang::with(['kategori', 'suppliers'])->get(),
            'kategori' => Kategori::all(),
            'suppliers' => Supplier::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'min:3',
            'deskripsi' => 'min:10',
            'harga' => 'required',
        ]);

        Barang::create($request->input());
        return Redirect::back();
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', [
            'title' => 'Barang',
            'data' => $barang,
            'kategori' => Kategori::all(),
            'suppliers' => Supplier::all()
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'min:3',
            'deskripsi' => 'min:10',
            'harga' => 'required'
        ]);

        $barang->update($request->input());
        return Redirect::to(route('barang.index'));
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return Redirect::back();
    }
}
