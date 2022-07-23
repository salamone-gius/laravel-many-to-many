<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // creo un metodo pubblico che si chiama come la tabella dipendente
    public function posts() {

        // traduzione: restituisci $questoModel(una singola categoria)->ha molti('il Model legato') (Post)
        return $this->hasMany('App\Post');
    }
}
