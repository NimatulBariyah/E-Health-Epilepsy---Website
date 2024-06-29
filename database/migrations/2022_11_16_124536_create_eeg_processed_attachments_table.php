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
        Schema::create('eeg_processed_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eeg_processed_id')->unsigned();
            $table->string('file');
            $table->string('caption')->nullable();
            $table->timestamps();

            $table->foreign('eeg_processed_id')->references('id')->on('eeg_processeds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eeg_processed_attachments');
    }
};
