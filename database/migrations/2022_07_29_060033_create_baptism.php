<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaptism extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baptism', function (Blueprint $table) {
            $table->id();
            $table->uuid('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->date('baptised_date');
            $table->string('priest');
            $table->json('sponsors');
            $table->text('dated');
            $table->text('series_of');
            $table->text('book_number');
            $table->integer('page');
            $table->text('purpose');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baptism');
    }
}
