<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('names', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name')->unique();
            $table->string('description');
            $table->boolean('anonymous')->default(false);
            $table->timestamps();
        });

        Schema::create('name_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('name_id');
            $table->boolean('upvote')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('names');
    }
};
