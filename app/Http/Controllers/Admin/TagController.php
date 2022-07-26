<?php

namespace App\Http\Controllers\Admin;

// importo la classe helper (prima dei modelli) che ha molti metodi per le stringhe che possono tornare utili, tipo per la generazione dello slug
use Illuminate\Support\Str;

// importo il model relativo
use App\Tag;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    
    public function create()
    {
        // restituisco la view della pagina blade create.blade
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    
    // come argomento del metodo store() viene passato il modello dei dati submittati dal form (Request $request)
    public function store(Request $request)
    {
        // 1. VALIDAZIONE
        // utilizzo il metodo validate e passo un array associativo come argomento
        $request->validate(
            [
                // 'colonna' => 'tutte le proprietà che il dato in ingresso deve avere' (doc: validation rules)
                'name' => 'required|string|max:100|unique:tags,name',
            ]
        );

        // 2. CREAZIONE DEL NUOVO TAG
        // passo tutti i dati in arrivo dal form ($request) dentro la variabile $data
        $data = $request->all();
        // istanzio il modello per la creazione di un nuovo tag
        $newTag = new Tag();
        // imposto con quali dati in arrivo andrò a riempire quali colonne
        $newTag->name = $data['name'];
        $newTag->slug = Str::of($data['name'])->slug('-');
        // salvo i dati a db in maniera permanente
        $newTag->save();

        // 3. REINDIRIZZAMENTO AD UNA VIEW
        // reindirizzo alla rotta che restituisce la view dell'elenco di tutti i tag
        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
