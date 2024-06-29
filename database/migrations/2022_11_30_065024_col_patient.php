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
        Schema::table('patients', function (Blueprint $table) {
            $table->string('disease_history')->nullable()->after('drug');
            $table->string('heart_rate')->nullable()->after('disease_history');
            $table->string('record_time')->nullable()->after('heart_rate');
            $table->string('gender')->nullable()->after('record_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('disease_history');
            $table->dropColumn('heart_rate');
            $table->dropColumn('record_time');
            $table->dropColumn('gender');
        });
    }
};
