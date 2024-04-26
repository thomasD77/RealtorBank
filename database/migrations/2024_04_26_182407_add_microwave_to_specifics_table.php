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
                [ 'Microgolfoven', 'microgolfoven', RoomKey::Kitchen],
            ];

            $specificsToInsert = [];

            foreach ($specifics as $specific) {
                $specificsToInsert[] = [
                    'title' => $specific[0],
                    'code' => $specific[1],
                    'room_key' => $specific[2],
                    'created_at' => DB::raw('NOW()'),
                    'updated_at' => DB::raw('NOW()'),
                ];
            }

            Specific::insert($specificsToInsert);
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
