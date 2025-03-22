<?php

use App\Enums\RoomKey;
use App\Models\Specific;
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
        Schema::table('specifics', function (Blueprint $table) {
            $specifics = [
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Basement],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Toilet],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::LivingRoom],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Kitchen],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Bathroom],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Storage],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Attic],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Garage],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Building],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::DriveWay],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::FrontYard],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Yard],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::Terrace],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::AppTerrace],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::OutHouseIn],
                [ 'Inbouwkast', 'buildInCupboard', RoomKey::OutHouseEx],
            ];

            $specificsToInsert = [];

            foreach ($specifics as $specific) {
                $specificsToInsert[] = [
                    'title' => $specific[0],
                    'code' => $specific[1],
                    'room_key' => $specific[2],
                    'original' => 1,
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()'),
                ];
            }

            Specific::insert($specificsToInsert);

            Specific::where('id', '<=', 72)->update(['original' => 1]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specifics', function (Blueprint $table) {
            //
        });
    }
};
