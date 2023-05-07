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
            $table->integer('order');
            $table->string('code')->nullable();
            $table->timestamps();
        });

        $areas = [
            ['Vloer', 'floor', 1],
            ['Plafond', 'celling', 2],
            ['Muur', 'wall', 3],
            ['Deur', 'door', 4],
            ['Raam', 'window', 5],
            ['Verwarming', 'heating', 6],
        ];

        $areasToInsert = [];

        foreach ($areas as $area) {
            $areasToInsert[] = [
                'title' => $area[0],
                'code' => $area[1],
                'order' => $area[2],
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
