<?php

use App\Models\Conform;
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
        Schema::create('conforms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code')->nullable();
            $table->timestamps();
        });

        $conforms = [
            ['Ventilatierooster', 'ventilalationGrid'],
            ['Rookmelder', 'smokeDetector'],
            ['Stopcontacten', 'socket'],
            ['Schakelaars', 'switches'],
            ['Aansluitingen', 'connection'],
            ['Verlichting', 'lighting'],
            ['Ventilater', 'ventillater'],
        ];

        $conformsToInsert = [];

        foreach ($conforms as $conform) {
            $conformsToInsert[] = [
                'title' => $conform[0],
                'code' => $conform[1],
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }

        Conform::insert($conformsToInsert);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conforms');
    }
};
