<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // creo un metodo pubblico che si chiama come la tabella collegata (al plurale in caso di relazione molti a molti)
    public function posts() {

        // traduzione: restituisci $questoModel(un singolo tag)->appartiene(è legato) a('il Model legato') (più post)
        return $this->belongsToMany('App\Post');
    }
}
