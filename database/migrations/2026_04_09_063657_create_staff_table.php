<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('name');
            $table->string('staff_id')->nullable();
            $table->string('status')->default('Active');
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('blood_group')->nullable();

            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();

            $table->decimal('salary', 10, 2)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
