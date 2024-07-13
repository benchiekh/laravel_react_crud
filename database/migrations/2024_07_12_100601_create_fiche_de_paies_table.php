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
        Schema::create('fiche_de_paies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('period_start');
            $table->date('period_end');
            $table->date('contract_start');
            $table->date('seniority_date');
            $table->string('classification');
            $table->string('professional_category');
            $table->string('job_title');
            $table->string('coefficient');
            $table->decimal('total_monthly_compensation', 10, 2);
            $table->decimal('base_salary', 10, 2);
            $table->decimal('hourly_rate', 10, 2);
            $table->integer('monthly_worked_hours');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_de_paies');
    }
};
