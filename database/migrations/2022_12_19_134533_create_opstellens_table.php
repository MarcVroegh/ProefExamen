<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opstellens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gast');
            $table->string('naam');
            $table->string('hoeveel');
            $table->string('prijs');
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opstellens');
    }
};
