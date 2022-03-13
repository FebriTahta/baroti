<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            // $table->string('harga')->nullable();
            $table->text('slug');
            // $table->text('link_tokped')->nullable();
            // $table->text('link_shopee')->nullable();
            $table->longText('deskripsi');
            $table->longtext('button');
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
        Schema::dropIfExists('products');
    }
}
