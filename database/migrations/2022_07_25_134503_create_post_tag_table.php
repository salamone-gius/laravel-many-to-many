<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            // imposto la colonna post_id come foreignId per la tabella 'posts'. Dentro il metodo ondelete() metto l'azione da fare alla cancellazione di un tag (cascade cancella l'associazione tra post e tags)
            $table->foreignId('post_id')->constrained()->onDelete('cascade');

            // imposto la colonna tag_id come foreignId per la tabella 'tags'. Dentro il metodo ondelete() metto l'azione da fare alla cancellazione di un tag (cascade cancella l'associazione tra post e tags)
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
