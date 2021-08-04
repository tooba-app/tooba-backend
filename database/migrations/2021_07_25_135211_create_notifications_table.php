<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("notifications", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("creator_id")
                ->constrained("users")
                ->onDelete("SET NULL");
            $table
                ->foreignId("action_id")
                ->constrained("action")
                ->onDelete("CASCADE");

            $table
                ->foreignId("title_id")
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL");
            $table
                ->foreignId("description_id")
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL");

            $table
                ->foreignId("date_id")
                ->constrained("tooba_dates", "id")
                ->onDelete("CASCADE")
                ->nullable();
            $table
                ->foreignId("time_id")
                ->constrained("tooba_times", "id")
                ->onDelete("CASCADE")
                ->nullable();

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
        Schema::dropIfExists("notifications");
    }
}
