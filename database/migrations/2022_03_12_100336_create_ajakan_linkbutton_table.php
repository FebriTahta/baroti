<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjakanLinkbuttonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajakan_linkbutton', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ajakan_id');
            $table->unsignedBigInteger('linkbutton_id');
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
        Schema::dropIfExists('ajakan_linkbutton');
    }
}
