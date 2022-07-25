<?php

use Illuminate\Database\Seeder;

// importo la classe helper (prima dei modelli) che ha molti metodi per le stringhe che possono tornare utili, tipo per la generazione dello slug
use Illuminate\Support\Str;

// importo il modello della tabella che devo popolare
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // definisco i tags in un array
        $tags = ['html', 'css', 'javascript', 'php'];

        // ciclando l'array dei tags...
        foreach ($tags as $tag) {

            // ...istanzio il modello per creare un nuovo tag...
            $newTag = new Tag();

            // setto chiavi e valori di ogni nuovo tag
            $newTag->name = $tag;

            // per la creazione dello slug utilizzo una libreria di metodi helper per le stringhe
            $newTag->slug = Str::of($newTag->name)->slug('-');

            // ...salvo i nuovi elementi (tags)
            $newTag->save();
        }
    }
}
