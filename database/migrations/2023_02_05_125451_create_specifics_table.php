<?php

use App\Models\Specific;
use App\Enums\RoomKey;
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
        Schema::create('specifics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code')->nullable();
            $table->string('room_key')->nullable();

            $table->timestamps();
        });

        $specifics = [
            [ 'Trap', 'trap', RoomKey::Basement],
            [ 'Wandrek', 'wallRack', RoomKey::Basement],

            [ 'Buitendeur', 'doorOutside', RoomKey::EntranceHall],
            [ 'Bedieningspaneel alarm', 'alarm', RoomKey::EntranceHall],
            [ 'Videofoon/parlofoon', 'videoPhone', RoomKey::EntranceHall],
            [ 'Deurbel', 'doorBell', RoomKey::EntranceHall],
            [ 'Inbouwkast', 'buildInCupboard', RoomKey::EntranceHall],
            [ 'Zolderluik', 'atticHatch', RoomKey::EntranceHall],
            [ 'Trap', 'trap', RoomKey::EntranceHall],

            [ 'Spiegel', 'mirror', RoomKey::Toilet],
            [ 'Wc-rolhouder', 'toiletPaperHolder', RoomKey::Toilet],
            [ 'kastje', 'closet', RoomKey::Toilet],
            [ 'wastafel', 'washingSink', RoomKey::Toilet],
            [ 'Toiletborstel', 'toiletBrush', RoomKey::Toilet],
            [ 'Toiletpot', 'toilet', RoomKey::Toilet],
            [ 'Handdoekhouder', 'towelRail', RoomKey::Toilet],

            [ 'Videofoon/parlofoon', 'videoPhone', RoomKey::LivingRoom],
            [ 'Haard', 'firePlace', RoomKey::LivingRoom],
            [ 'Sierschouw', 'decorativeFirePlace', RoomKey::LivingRoom],
            [ 'Thermostaat', 'thermostat', RoomKey::LivingRoom],

            [ 'Keukenmeubilair', 'kitchenCloset', RoomKey::Kitchen],
            [ 'Werkblad', 'workTop', RoomKey::Kitchen],
            [ 'Gootsteen', 'sink', RoomKey::Kitchen],
            [ 'Spatwand', 'splashBack', RoomKey::Kitchen],
            [ 'Buitendeur', 'doorOutside', RoomKey::Kitchen],
            [ 'Afzuigkap', 'suction', RoomKey::Kitchen],
            [ 'Kookplaat', 'cooker', RoomKey::Kitchen],
            [ 'Oven', 'oven', RoomKey::Kitchen],
            [ 'Koelkast', 'fridge', RoomKey::Kitchen],
            [ 'Vaatwasser', 'dishwasher', RoomKey::Kitchen],

            [ 'Wandrek', 'wallRack', RoomKey::Storage],
            [ 'Afvoerpunt', 'dischargePoint', RoomKey::Storage],
            [ 'Gootsteen', 'sink', RoomKey::Storage],
            [ 'Kraanwerk', 'crane', RoomKey::Storage],
            [ 'Buitendeur', 'doorOutside', RoomKey::Storage],

            [ 'Buitendeur', 'doorOutside', RoomKey::NightHall],
            [ 'Bedieningspaneel alarm', 'alarm', RoomKey::NightHall],
            [ 'Videofoon/parlofoon', 'videoPhone', RoomKey::NightHall],
            [ 'Deurbel', 'doorBell', RoomKey::NightHall],
            [ 'Inbouwkast', 'buildInCupboard', RoomKey::NightHall],
            [ 'Zolderluik', 'atticHatch', RoomKey::NightHall],
            [ 'Trap', 'trap', RoomKey::NightHall],

            [ 'Badkamermeubel', 'bathroomFurniture', RoomKey::Bathroom],
            [ 'Wastafel', 'sink', RoomKey::Bathroom],
            [ 'Kastje', 'closet', RoomKey::Bathroom],
            [ 'Zeephouder', 'soapHolder', RoomKey::Bathroom],
            [ 'Kapstok', 'coatRack', RoomKey::Bathroom],
            [ 'Handdoekhouder', 'towelRail', RoomKey::Bathroom],
            [ 'Bekerhouder', 'cupHolder', RoomKey::Bathroom],
            [ 'Spiegel', 'mirror', RoomKey::Bathroom],
            [ 'Douche', 'shower', RoomKey::Bathroom],
            [ 'Bad', 'bath', RoomKey::Bathroom],
            [ 'Toiletpot', 'toilet', RoomKey::Bathroom],
            [ 'Toiletborstel', 'toiletBrush', RoomKey::Bathroom],
            [ 'Wc-rolhouder', 'toiletPaperHolder', RoomKey::Bathroom],
            [ 'Afvoerpunt', 'dischargePoint', RoomKey::Bathroom],
            [ 'Kraanwerk', 'crane', RoomKey::Bathroom],

            [ 'Inbouwkast', 'buildInCupboard', RoomKey::Bedroom],

            [ 'Isolatie', 'isolation', RoomKey::Attic],

            [ 'Garagepoort', 'garageDoor', RoomKey::Garage],
            [ 'Wandrek', 'wallRack', RoomKey::Garage],
            [ 'Gootsteen', 'sink', RoomKey::Garage],
            [ 'Kraanwerk', 'crane', RoomKey::Garage],
            [ 'Buitendeur', 'doorOutside', RoomKey::Garage],

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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specifics');
    }
};
