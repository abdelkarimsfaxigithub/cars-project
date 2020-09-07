<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginKeyInCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('mark_id')->references('id')->on('marks')
                ->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('car_models')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign('cars_mark_id_foreign');
            $table->dropForeign('cars_model_id_foreign');          
        });
    }
}
