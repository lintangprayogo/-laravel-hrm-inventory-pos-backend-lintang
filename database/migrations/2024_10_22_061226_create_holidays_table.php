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

        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("date");
            $table->integer("month");
            $table->integer("year");
            $table->boolean("is_weekend")->default(0);
            $table->foreignId("created_by")->constrained("users")->onDelete("cascade");
            $table->foreignId("company_id")->constrained("companies")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};
