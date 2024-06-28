<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PenerimaanController extends Controller
{
    public function index()
    {
        return view('penerimaan.index', [
            'title' => 'Penerimaan',
            'data' => Penerimaan::all(),
            'barang' => Barang::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required',
        ]);

        Penerimaan::create($request->input());
        return Redirect::back();
    }

    public function edit(Penerimaan $penerimaan)
    {
        return view('penerimaan.edit', [
            'title' => 'Penerimaan',
            'data' => $penerimaan,
            'barang' => Barang::all()
        ]);
    }

    public function update(Request $request, Penerimaan $penerimaan)
    {
        $request->validate([
            'jumlah' => 'required',
        ]);

        $penerimaan->update($request->input());
        return Redirect::to(route('penerimaan.index'));
    }

    public function destroy(Penerimaan $penerimaan)
    {
        $penerimaan->delete();
        return Redirect::back();
    }
}
