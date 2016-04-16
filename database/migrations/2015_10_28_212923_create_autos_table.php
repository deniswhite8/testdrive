<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mark_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('generation_id')->unsigned()->nullable();
            $table->integer('body_id')->unsigned();
            $table->integer('gearbox_id')->unsigned();
            $table->integer('mileage')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('mark_id')
                ->references('id')->on('auto_marks')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('model_id')
                ->references('id')->on('auto_models')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('generation_id')
                ->references('id')->on('auto_generations')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('body_id')
                ->references('id')->on('auto_bodies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('gearbox_id')
                ->references('id')->on('auto_gearboxes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autos');
    }
}
