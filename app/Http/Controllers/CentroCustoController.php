<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{CentroCusto,Lancamento, user};
use Database\Factories\CentroCustoFactory;

class CentroCustoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centroCustos = CentroCusto::orderBY('centro_custo')->paginate(10);
        return view('centro.index') -> with(compact('centroCustos')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centro = null;
        return view('centro.form') -> with(compact('centro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $centro = CentroCusto::create($request->all());
        return view('centro.index') 
        ->with('novo', 'Centro de Custo com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(CentroCusto $id)
    {
        $centro = CentroCusto::with([
            'lancamentos', 'lancamentos.tipo', 'lancamentos.usuario',
        ])->find($id)->paginate(10); 

        return view('centro.show')->with(compact('centro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CentroCusto $id)
    {
        $centro = CentroCustoFactory::find($id);
        return view('centro.form') -> with(compact('centro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CentroCusto $id)
    {
        $centro = CentroCusto::find($id);
        $centro->update($request->all());
        return redirect()-> route('centro.index') ->with('atualizar', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        CentroCusto::find($id)->delete();
        return redirect()->back()->with('excluido', 'Excluido com sucesso!');
    }
}
