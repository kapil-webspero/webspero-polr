<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('short_url');
            $table->longText('long_url');
            $table->string('ip');
            $table->string('creator');
            $table->string('clicks')->default(0);
            $table->string('secret_key');

            $table->boolean('is_disabled')->default(0);
            $table->boolean('is_custom')->default(0);
            $table->boolean('is_api')->default(0);
            $table->string('long_url_hash', 10)->nullable();
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
        Schema::dropIfExists('links');
    }
}
