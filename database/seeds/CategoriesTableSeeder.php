<?php

use Illuminate\Database\Seeder;

// importo la classe helper (prima dei modelli) che ha molti metodi per le stringhe che possono tornare utili, tipo per la generazione dello slug
use Illuminate\Support\Str;

// importo il modello della tabella che devo popolare
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // definisco le categorie in un array
        $categories = ['Frontend', 'Backend', 'Full Stack', 'DevOps'];

        // ciclando l'array delle categorie...
        foreach ($categories as $category) {

            // ...istanzio il modello per creare una nuova categoria...
            $newCategory = new Category();

            // setto chiavi e valori di ogni nuova categoria
            $newCategory->name = $category;

            // per la creazione dello slug utilizzo una libreria di metodi helper per le stringhe
            $newCategory->slug = Str::of($newCategory->name)->slug('-');

            // ...salvo i nuovi elementi (categorie)
            $newCategory->save();
        }
    }
}
