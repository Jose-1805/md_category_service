<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->unique()->comment('Identificador único de cada registro');
            $table->string('name', 100)->comment('Nombre asignado a la categoría');
            $table->text('description')->comment('Descripción detallada de la categoría');
        });


        Schema::table('categories', function (Blueprint $table) {
            $table->foreignUuid('category_id')
                ->nullable()
                ->comment('Relación a la categoría padre de la categoría actual')
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->uuid('store_id')->comment('Relación a la tienda a la cual pertenece la categoría actual');
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
        Schema::dropIfExists('categories');
    }
};
