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
        Schema::create('arbeitens', function (Blueprint $table) {
            $table->id();
            $table->string('ort');
            $table->string('strasse');
            $table->longText('arbeitsbereiche');
            $table->string('notfallnummer');
            $table->foreignId('ansprechpartner1_id')->nullable()->constrained('ansprechpartners')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('ansprechpartner2_id')->nullable()->constrained('ansprechpartners')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('arbeitens');
    }
};
