<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('bank_account_number');
            $table->timestamps();

            $table->unique(['first_name', 'last_name', 'date_of_birth']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
