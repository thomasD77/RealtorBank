<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use \App\Models\Room;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('general')->nullable();
            $table->string('analysis')->nullable();
            $table->text('extra')->nullable();

            $table->string('title');
            $table->timestamps();
        });

        $rooms = [
            'Cellar',
            'GroundFloor',
            'Toilet',
            'LivingRoom',
            'Kitchen',
            'Bathroom',
            'NightHall',
            'Storage',
            'Bedroom',
        ];

        $roomsToInsert = [];
        foreach ($rooms as $room) {
            $roomsToInsert[] = [
                'title' => $room,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ];
        }
        Room::insert($roomsToInsert);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
