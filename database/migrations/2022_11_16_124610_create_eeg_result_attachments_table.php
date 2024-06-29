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
        Schema::create('eeg_result_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eeg_id')->unsigned();
            $table->string('file');
            $table->string('caption')->nullable();
            $table->timestamps();

            $table->foreign('eeg_id')->references('id')->on('eeg_results')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eeg_result_attachments');
    }
};
