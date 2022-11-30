<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToChildMedicalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('child_medical_data', function (Blueprint $table) {
            $table
                ->foreign('child_id')
                ->references('completename')
                ->on('children')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('rhuBhw_id')
                ->references('id')
                ->on('rhu_bhws')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('child_medical_data', function (Blueprint $table) {
            $table->dropForeign(['child_id']);
            $table->dropForeign(['rhuBhw_id']);
        });
    }
}
