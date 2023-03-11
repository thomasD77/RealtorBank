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
        Schema::create('outdoors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code')->nullable();
            $table->string('room_key')->nullable();

            $table->timestamps();
        });

        $outdoors = [
            [ 'Muren', 'walls', RoomKey::Building],
            [ 'Ramen', 'windows', RoomKey::Building],
            [ 'Dak', 'roof', RoomKey::Building],
            [ 'Brievenbus', 'mailbox', RoomKey::Building],
            [ 'Buitentrap', 'outdoorTrap', RoomKey::Building],
            [ 'balkon', 'balcony', RoomKey::Building],

            [ 'Verharding oprit', 'driveWayMaterial', RoomKey::DriveWay],
            [ 'Verharding voetpad', 'footPathMaterial', RoomKey::DriveWay],
            [ 'Inrijpoort', 'gate', RoomKey::DriveWay],
            [ 'Omheining', 'fence', RoomKey::DriveWay],
            [ 'Tuinpoort', 'gardenGate', RoomKey::DriveWay],
            [ 'Buitenverlichting', 'outdoorLight', RoomKey::DriveWay],
            [ 'Brievenbus', 'mailbox', RoomKey::DriveWay],

            [ 'Beplanting', 'planting', RoomKey::FrontYard],
            [ 'Omheining', 'fence', RoomKey::FrontYard],
            [ 'Tuinpoort', 'gardenGate', RoomKey::FrontYard],
            [ 'Buitenverlichting', 'outdoorLight', RoomKey::FrontYard],
            [ 'Verharding voetpad', 'footPathMaterial', RoomKey::FrontYard],
            [ 'Overige zaken', 'extraFrontYard', RoomKey::FrontYard],

            [ 'Beplanting', 'planting', RoomKey::Yard],
            [ 'Omheining', 'fence', RoomKey::Yard],
            [ 'Tuinpoort', 'gardenGate', RoomKey::Yard],
            [ 'Buitenverlichting', 'outdoorLight', RoomKey::Yard],
            [ 'Verharding voetpad', 'footPathMaterial', RoomKey::Yard],
            [ 'Overige zaken', 'extraFrontYard', RoomKey::Yard],

            [ 'Verharding oprit', 'driveWayMaterial', RoomKey::Terrace],
            [ 'Kraanwerk', 'crane', RoomKey::Terrace],
            [ 'Buitenverlichting', 'outdoorLight', RoomKey::Terrace],
            [ 'Stopcontacten', 'sockets', RoomKey::Terrace],
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outdoors');
    }
};
