<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained();
            $table->string('full_name');
            $table->string('hero');
            $table->string('city');
            $table->string('avatar')->nullable();
            $table->text('bio');
            $table->tinyInteger('search_status');
            $table->tinyInteger('experience_level');
            $table->date('start_date');
            $table->text('website')->nullable();
            $table->text('github')->nullable();
            $table->text('vkontakte')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('stackoverflow')->nullable();
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
        Schema::dropIfExists('developer_profiles');
    }
};
