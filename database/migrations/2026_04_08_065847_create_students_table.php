<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('adm_no')->unique();
            $table->string('name');
            $table->string('roll_no')->nullable();
            $table->string('status')->nullable();

            $table->foreignId('class_id')->constrained('classes')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();

            $table->string('house')->nullable();
            $table->string('category')->nullable();

            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->date('doa')->nullable();
            $table->string('coa')->nullable();

            $table->string('blood_group')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('guardian')->nullable();

            $table->string('mobile_no')->nullable();
            $table->string('wa_no')->nullable();
            $table->string('email')->nullable();

            $table->string('religion')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('aadhar')->nullable();

            $table->string('pen')->nullable();
            $table->string('apaar_id')->nullable();
            $table->string('registered_email')->nullable();

            $table->text('address')->nullable();

            $table->date('tc_issue_date')->nullable();
            $table->string('tc_session')->nullable();

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
