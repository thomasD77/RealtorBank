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
            $table->timestamps();
        });

        $specifics = [
            'Buitendeur',
            'Bedieningspaneel alarm',
            'Videofoon/parlofoon',
            'Deurbel',
            'Inbouwkast',
            'Zolderluik',
            'Ventilater',
            'Spiegel',
            'Wc-rolhouder',
            'kastje',
            'Wastafel',
            'Toiletborstel',
            'Toiletpot',
            'Handdoekhouder',
            'Haard',
            'Sierschouw',
            'Thermostaat',
            'Keukenmeubilair',
            'Werkblad',
            'Gootsteen',
            'spatwand',
            'Afzuigkap',
            'Kookplaat',
            'Oven',
            'Koelkast',
            'Vaatwasser',
            'Wandrek',
            'Afvoerpunt',
            'Kraanwerk',
            'badkamermeubel',
            'Wastafel',
            'kastje',
            'Zeephouder',
            'Kapstok',
            'Trap',
        ];

        $specificsToInsert = [];

        foreach ($specifics as $specific) {
            $specificsToInsert[] = [
                'title' => $specific,
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
