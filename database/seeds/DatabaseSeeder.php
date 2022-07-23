<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // scommentando questa riga e inserendo le classi di tutti i seeders in un array come paramentro del metodo call(), al comando php artisan db:seed lancerò tutti i seeders qui contenuti 
        $this->call(
            [
                CategoriesTableSeeder::class
            ]
        );
    }
}
