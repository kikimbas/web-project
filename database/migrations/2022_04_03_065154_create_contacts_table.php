<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
//            $table->string('phone');
//            $table->string('email');
//            $table->string('user_id');
//            $table->string('fax')->nullable();
//            $table->string('country')->nullable();
//            $table->string('city')->nullable();
//            $table->string('index')->nullable();
//            $table->string('company')->nullable();
//            $table->string('rating')->nullable();
//            $table->string('education')->nullable();
//            $table->string('profession')->nullable();
//            $table->string('nikname')->nullable();
//            $table->string('pager')->nullable();
//            $table->text('address')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
