<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    public function index()
    {
        return view('suppliers.index', [
            'title' => 'Suppliers',
            'data' => Supplier::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'min:3',
            'alamat' => 'min:5'
        ]);

        Supplier::create($request->input());
        return Redirect::back();
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', [
            'title' => 'Suppliers',
            'data' => $supplier
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama' => 'min:3',
            'alamat' => 'min:5'
        ]);

        $supplier->update($request->input());
        return Redirect::to(route('suppliers.index'));
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return Redirect::back();
    }
}
