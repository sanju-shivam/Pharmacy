<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('phone')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('slug')->nullable();
            $table->string('owner')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('employees')->nullable();
            $table->string('year')->nullable();
            $table->string('type')->nullable();
            $table->string('gstn')->nullable();
            $table->string('payment')->nullable();
            $table->string('nature')->nullable();
            $table->mediumText('about')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
