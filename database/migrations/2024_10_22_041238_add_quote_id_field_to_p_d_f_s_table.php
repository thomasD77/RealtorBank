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
        Schema::table('p_d_f_s', function (Blueprint $table) {
            $table->unsignedBigInteger('quote_id')->nullable()->default(0)->index();
            $table->integer('pricing')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_d_f_s', function (Blueprint $table) {
            //
        });
    }
};
