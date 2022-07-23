<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCategoryIdPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            // aggiungo nullable() per non creare errori con i post già creati senza categoria
            // con after('nome_colonna') decido DOPO quale colonna inserire quella nuova
            // constrained() aggiunge il vincolo/relazione con un'altra tabella
            // aggiungo onDelete('set null') per far sì che quando la category viene cancellata, il campo viene settato a 'null' (altrimenti darebbe errore)
            $table->foreignId('category_id')->nullable()->after('id')->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            // faccio decadere (drop) il vincolo/relazione
            $table->dropForeign(['category_id']);

            // elimino la colonna
            $table->dropColumn('category_id');
        });
    }
}
