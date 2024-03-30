<?php

use App\Enums\RoomKey;
use App\Models\Outdoor;
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
        Schema::table('outdoors', function (Blueprint $table) {
            $outdoors = [
                [ 'Verharding terras', 'driveWayMaterial', RoomKey::AppTerrace],
                [ 'Overhang', 'celling', RoomKey::AppTerrace],
                [ 'Buitenmuur', 'outsideWall', RoomKey::AppTerrace],
                [ 'Buitenkant ramen', 'outsideWindows', RoomKey::AppTerrace],
                [ 'Balustrade', 'handrail', RoomKey::AppTerrace],
                [ 'Kraanwerk', 'crane', RoomKey::AppTerrace],
                [ 'Stopcontacten', 'sockets', RoomKey::AppTerrace],
                [ 'Schakelaars', 'switches', RoomKey::AppTerrace],
                [ 'Verlichting', 'lighting', RoomKey::AppTerrace],
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
        //
    }
};
