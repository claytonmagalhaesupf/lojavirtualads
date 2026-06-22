<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function index()
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::all(),
        ]);
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(SupplierRequest $request)
    {
        Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/suppliers')->with('success', 'Fornecedor cadastrado!');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    public function update(SupplierRequest $request)
    {
        $supplier = Supplier::find($request->id);

        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/suppliers')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        try {
            $supplier = Supplier::find($id);
            $supplier->delete();

            return redirect('/suppliers')->with('success', 'Fornecedor excluído com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao excluir fornecedor: ' . $e->getMessage());
            return redirect('/suppliers')->with('error', 'Não foi possível excluir o fornecedor. Tente novamente.');
        }
    }
}
