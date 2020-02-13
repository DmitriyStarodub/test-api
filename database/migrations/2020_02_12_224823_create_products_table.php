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
        if(! Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('title');
                $table->text('description')->nullable();
                $table->decimal('price', 20, 2)->nullable();

                if (Schema::hasTable('users')) {
                    $table->integer('user_id')->unsigned()->nullable();
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                }

                if (Schema::hasTable('currencies')) {
                    $table->integer('currency_id')->unsigned()->nullable();
                    $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
                }

                if (Schema::hasTable('categories')) {
                    $table->integer('category_id')->unsigned()->nullable();
                    $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
                }

                $table->timestamps();
            });
        }
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
