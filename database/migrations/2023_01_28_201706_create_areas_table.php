<?php

    use App\Models\Area;
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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code')->nullable();
            $table->timestamps();
        });

        $areas = [
            ['Vloer', 'floor'],
            ['Plafond', 'celling'],
            ['Deur', 'door'],
            ['Muur', 'wall'],
            ['Raam', 'window'],
            ['Verwarming', 'heating'],
        ];

        $areasToInsert = [];

        foreach ($areas as $area) {
            $areasToInsert[] = [
                'title' => $area[0],
                'code' => $area[1],
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
