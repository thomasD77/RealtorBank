<?php

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
        Schema::create('specific_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('inspection_id')
                ->index();

            $table->unsignedInteger('floor_id')
                ->index();

            $table->unsignedInteger('room_id')
                ->index();

            $table->unsignedInteger('specific_id')
                ->index();

            $table->string('handrail')->nullable();
            $table->string('material')->nullable();
            $table->string('shelves')->nullable();

            $table->string('color')->nullable();
            $table->string('present')->nullable();
            $table->string('finish')->nullable();
            $table->string('dorpel')->nullable();
            $table->string('glassInlay')->nullable();
            $table->string('handle')->nullable();
            $table->string('mailbox')->nullable();
            $table->string('peephole')->nullable();
            $table->string('window')->nullable();
            $table->string('doorBel')->nullable();
            $table->string('threshHold')->nullable();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('model')->nullable();
            $table->string('doors')->nullable();
            $table->string('drawers')->nullable();
            $table->string('rod')->nullable();
            $table->string('trap')->nullable();
            $table->string('mirror')->nullable();
            $table->string('toiletPaperHolder')->nullable();
            $table->string('cupboard')->nullable();
            $table->string('stop')->nullable();
            $table->string('crane')->nullable();
            $table->string('siphon')->nullable();
            $table->string('angleCrane')->nullable();
            $table->string('rinse')->nullable();
            $table->string('seat')->nullable();
            $table->string('energy')->nullable();

            $table->string('cabLow')->nullable();
            $table->string('cabLowDoors')->nullable();
            $table->string('cabLowDrawers')->nullable();
            $table->string('cabLowShelves')->nullable();

            $table->string('cabHigh')->nullable();
            $table->string('cabHighDoors')->nullable();
            $table->string('cabHighDrawers')->nullable();
            $table->string('cabHighShelves')->nullable();

            $table->string('cabinet')->nullable();
            $table->string('cabinetDoors')->nullable();
            $table->string('cabinetDrawers')->nullable();
            $table->string('cabinetShelves')->nullable();

            $table->string('cutleryDrawer')->nullable();
            $table->string('kitchenHandle')->nullable();
            $table->string('filter')->nullable();
            $table->string('lighting')->nullable();
            $table->string('manual')->nullable();
            $table->string('zones')->nullable();
            $table->string('bakingTray')->nullable();
            $table->string('rooster')->nullable();
            $table->string('shelf')->nullable();
            $table->string('vegetableTray')->nullable();
            $table->string('doorBins')->nullable();
            $table->string('cutleryBasket')->nullable();

            $table->string('floor')->nullable();
            $table->string('walls')->nullable();
            $table->string('shower')->nullable();
            $table->string('protection')->nullable();
            $table->string('casing')->nullable();
            $table->string('position')->nullable();
            $table->string('vaporBarrier')->nullable();
            $table->string('service')->nullable();

            $table->string('analysis')->nullable();
            $table->text('extra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specific_areas');
    }
};
