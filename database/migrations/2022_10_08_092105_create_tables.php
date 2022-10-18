<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('last_visit_at')->nullable();
            $table->string('keycloak_id')->nullable();
            $table->integer('visits')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        // Name propositions from users
        Schema::create('names', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->restrictOnDelete();
            $table->string('name')->unique();
            $table->string('description');
            $table->boolean('anonymous')->default(false);
            $table->timestamps();
        });

        // Pivot table for votes
        Schema::create('name_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->restrictOnDelete();
            $table->foreignId('name_id')->restrictOnDelete();
            $table->boolean('upvote')->default(true);
            $table->timestamps();
        });

        // Log all votes during the survey
        Schema::create('log_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->restrictOnDelete();
            $table->foreignId('name_id')->restrictOnDelete();
            $table->boolean('upvote')->default(true);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('names');
    }
};
