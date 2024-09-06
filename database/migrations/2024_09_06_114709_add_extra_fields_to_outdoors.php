<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Enums\RoomKey;
use App\Models\Outdoor;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outdoors', function (Blueprint $table) {
            //
            $outdoors = [
                [ 'Luifel', 'canopy', RoomKey::AppTerrace],
                [ 'Luifel', 'canopy', RoomKey::Terrace],
                [ 'Berging-Kast', 'storageCupboard', RoomKey::Terrace],
                [ 'Berging-Kast', 'storageCupboard', RoomKey::AppTerrace],
            ];

            $outdoorsToInsert = [];
            foreach ($outdoors as $outdoor) {
                $outdoorsToInsert[] = [
                    'title' => $outdoor[0],
                    'code' => $outdoor[1],
                    'room_key' => $outdoor[2],
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()'),
                ];
            }

            Outdoor::insert($outdoorsToInsert);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outdoors', function (Blueprint $table) {
            //
        });
    }
};
