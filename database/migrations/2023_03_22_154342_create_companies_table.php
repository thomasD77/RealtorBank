<?php

    use App\Models\Inspection;
    use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('VAT')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->text('description')->nullable();
            $table->timestamps();
        });

        //This is only for testing
        Inspection::createInspection();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
