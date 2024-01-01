<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stockReagens', function (Blueprint $table) {
            $table->stockId();
            $table->string('noCatalog');
            $table->string('batch');
            $table->integer('quantity');
            $table->date('expiredDate');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stockReagens');
    }
};
