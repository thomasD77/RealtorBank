<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Carbon;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();;
            $table->string('lastName')->nullable();;
            $table->string('phone')->nullable();;
            $table->text('about')->nullable();;

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //This is for the sidebar toggle
            $table->unsignedInteger('category_id')
                ->index()->nullable();
            $table->unsignedInteger('room_id')
                ->index()->nullable();
            $table->unsignedInteger('floor_id')
                ->index()->nullable();
            $table->unsignedInteger('area_id')
                ->index()->nullable();
            $table->string('template')->nullable();
        });

        DB::table('users')->insert([
            'firstName'=>'Thomas',
            'lastName'=>'Demeulenaere',
            'email'=>'info@innova-webcreations.be',
            'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'password'=>bcrypt('@Skatemovies777'),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
