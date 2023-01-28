<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;
use \App\Models\Area;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        $areas = [
            'Vloer',
            'Plafond',
            'Deur',
            'Muur',
            'Raam',
            'Verwarming',
            'Trap',
            'Wandrek',
            'Ventilatierooster',
            'Rookmelder',
            'Stopcontacten',
            'Schakelaars',
            'Aansluitingen',
            'Verlichting',
            'Ventilater',
        ];

        $areasToInsert = [];
        foreach ($areas as $area) {
            $areasToInsert[] = [
                'title' => $area,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }
        Area::insert($areasToInsert);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
};
