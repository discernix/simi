<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index', [
            'title' => 'Kategori',
            'data' => Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'min:3'
        ]);

        Kategori::create($request->input());
        return Redirect::back();
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'title' => 'Kategori',
            'data' => $kategori
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'min:3'
        ]);

        $kategori->update($request->input());
        return Redirect::to(route('kategori.index'));
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return Redirect::back();
    }
}
