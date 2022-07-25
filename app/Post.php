<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // imposto le condizioni per il mass assignment (protezione dei campi)
    // passando 'tags' all'interno, escludo dal mass assignment quella colonna
    protected $guarded = ['tags'];

    // creo un metodo pubblico che si chiama come la tabella principale (al singolare in caso di relazione uno a molti)
    public function category() {

        // traduzione: restituisci $questoModel(un singolo post)->appartiene a('il Model legato') (una categoria)
        return $this->belongsTo('App\Category');
    }

    // creo un metodo pubblico che si chiama come la tabella collegata (al plurale in caso di relazione molti a molti)
    public function tags() {

        // traduzione: restituisci $questoModel(un singolo post)->appartiene (è legato) a('il Model legato') (più tag)
        return $this->belongsToMany('App\Tag');
    }
}
