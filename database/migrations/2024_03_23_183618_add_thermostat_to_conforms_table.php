<?php

use App\Models\Conform;
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
        Schema::table('conforms', function (Blueprint $table) {
            $conforms = [
                ['Thermostaat', 'thermostat'],
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conforms', function (Blueprint $table) {
            //
        });
    }
};
