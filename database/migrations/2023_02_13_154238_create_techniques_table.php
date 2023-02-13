<?php

    use App\Models\Technique;
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
        Schema::create('techniques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        $techniques = [
            ['Zekeringskast', 'fuseBox'],
            ['CV toestel', 'cvDevice'],
            ['Boiler', 'boiler'],
            ['Waterverzachter', 'waterSoftener'],
            ['Water pomp', 'waterPump'],
            ['Aircogroep', 'airco'],
            ['Ventilatiegroep', 'ventilationGroup'],
            ['Zonnepanelen', 'solarPanels'],
            ['Omvormer', 'converter'],
        ];

        $techniquesToInsert = [];

        foreach ($techniques as $technique) {
            $techniquesToInsert[] = [
                'title' => $technique[0],
                'code' => $technique[1],
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }

        Technique::insert($techniquesToInsert);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('techniques');
    }
};
