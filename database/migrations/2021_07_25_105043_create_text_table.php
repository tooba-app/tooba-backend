<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("texts", function (Blueprint $table) {
            $table->id();
            $table->foreignId("text_id")->index();

            $table
                ->foreignId("creator_id")
                ->nullable()
                ->constrained("users", "id")
                ->onDelete("SET NULL");

            $table->string("language_id");
            $table
                ->foreign("language_id")
                ->references("code")
                ->on("languages");

            $table->text("text");
            $table->string("type");
            $table->string("status");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("text");
    }
}
