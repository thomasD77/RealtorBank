<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('category_pricings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        DB::table('category_pricings')->insert([
            ['title' => 'Vloer', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Plafond', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Deur', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Muur', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Raam', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Verwarming', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Rookmelder', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Trap', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Wastafel', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Toiletpot', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Garagepoort', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Brievenbus', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Schoorsteen', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Gras', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Stopcontacten', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Schakelaars', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Thermostaat', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Spiegel', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Buitendeur', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Douche', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Bad', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Kookplaat', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Oven', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Verlichting', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Koelkast', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Ventilatierooster', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Dampkap', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_pricings');
    }
};
