<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_facilities', function (Blueprint $table) {
            $table->id();
            $table->boolean('assigned');
            $table->string('facility_name');
            $table->boolean('isFaulty');
            $table->date('outage_from');
            $table->date('outage_to');
            $table->boolean('remove_outage_date');
            $table->text('notes');
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
        Schema::dropIfExists('assign_facilities');
    }
}
