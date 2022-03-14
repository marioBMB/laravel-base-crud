<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            
            $table->id();
            $table->string('title', 100);
            $table->text('description');
            $table->string('thumb', 255);
            $table->unsignedDecimal('price', 6, 2);
            $table->string('series', 50);
            $table->date('sale_date');
            $table->string('type', 50);
            $table->timestamps();

            /*
            "artists" => [
                "José Luis García-López",
                "Clay Mann",
                "Rafael Albuquerque",
                "Patrick Gleason",
                "Dan Jurgens",
                "Joe Shuster",
                "Neal Adams",
                "Curt Swan",
                "John Cassaday",
                "Olivier Coipel",
                "Jim Lee"
            ],
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
