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
            $table->string('companyName')->nullable();;
            $table->text('about')->nullable();;

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('signature')->nullable();
            $table->rememberToken();
            $table->timestamps();

            //Relation
            $table->unsignedInteger('company_id')->nullable();

            //This is for the sidebar toggle
            $table->unsignedInteger('sidebar_category_id')
                ->index()->nullable();
            $table->unsignedInteger('sidebar_room_id')
                ->index()->nullable();
            $table->unsignedInteger('sidebar_floor_id')
                ->index()->nullable();
            $table->unsignedInteger('sidebar_area_id')
                ->index()->nullable();
            $table->string('sidebar_template')
                ->index()
                ->nullable();
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
