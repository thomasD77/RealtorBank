<?php

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
        Schema::create('specifics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code')->nullable();
            $table->string('room_key')->nullable();

            $table->timestamps();
        });

        $specifics = [
            [ 'Trap', 'trap', 'kelder'],
            [ 'Wandrek', 'wallRack', 'inkomhal'],
            [ 'Buitendeur', 'doorOutside', 'inkomhal'],
            [ 'Bedieningspaneel alarm', 'alarm', 'inkomhal'],
            [ 'Videofoon/parlofoon', 'videoPhone', 'inkomhal'],
            [ 'Deurbel', 'doorBell', 'inkomhal'],
            [ 'Inbouwkast', 'buildInCupboard', 'inkomhal'],
            [ 'Zolderluik', 'atticHatch', 'inkomhal'],
            [ 'Spiegel', 'mirror', 'toilet'],
            [ 'Wc-rolhouder', 'toiletPaperHolder', 'toilet'],
            [ 'kastje', 'closet', 'toilet'],
            [ 'wastafel', 'washingSink', 'toilet'],
            [ 'Toiletborstel', 'toiletBrush', 'toilet'],
            [ 'Toiletpot', 'toilet', 'toilet'],
            [ 'Handdoekhouder', 'towelRail', 'toilet'],

//            'Ventilater',
//            'Haard',
//            'Sierschouw',
//            'Thermostaat',
//            'Keukenmeubilair',
//            'Werkblad',
//            'Gootsteen',
//            'spatwand',
//            'Afzuigkap',
//            'Kookplaat',
//            'Oven',
//            'Koelkast',
//            'Vaatwasser',
//            'Wandrek',
//            'Afvoerpunt',
//            'Kraanwerk',
//            'badkamermeubel',
//            'kastje',
//            'Zeephouder',
//            'Kapstok',
//            'trap'
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
