<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // imposto le condizioni per il mass assignment (protezione dei campi)
    protected $guarded = [];

    // creo un metodo pubblico che si chiama come la tabella principale (al singolare in caso di relazione uno a molti)
    public function category() {

        // traduzione: restituisci $questoModel(un singolo post)->appartine a('il Model legato') (una categoria)
        return $this->belongsTo('App\Category');
    }
}
