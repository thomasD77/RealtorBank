<?php

    use App\Models\Floor;
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
        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code')->nullable();
            $table->timestamps();
        });

        $floors = [
            ['Kelderverdieping', 'basement'],
            ['Gelijkvloers', 'groundFloor'],
            ['Bovenverdieping', 'upperFloor'],
        ];

        $floorsToInsert = [];

        foreach ($floors as $floor) {
            $floorsToInsert[] = [
                'title' => $floor[0],
                'code' => $floor[1],
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }

        Floor::insert($floorsToInsert);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('floors');
    }
};
