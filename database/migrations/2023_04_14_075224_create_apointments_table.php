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
        Schema::create('apointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('code');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('Cascade');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('Cascade');
            $table->timestamp('time');
            $table->enum('status', ['Completed', 'Confirmed', 'Cancelled', 'Missed']);
            $table->string('message', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apointments');
    }
};
