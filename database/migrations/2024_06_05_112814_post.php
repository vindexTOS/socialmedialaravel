<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("post", function(Blueprint $table){
             $table->id();
             $table->string("title");
             $table->string("text");
       

            //  $table->foreign("user_id")->references("id")->on("users");
            //  $table->foregin("img_id")->references("id")->on("photos");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("post");
    }
};