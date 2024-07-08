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
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('employee_id');
        $table->decimal('salary', 8, 2);
        $table->date('date');
        $table->decimal('total_deductions', 8, 2)->default(0);
        $table->decimal('total_allowances', 8, 2)->default(0);
        $table->decimal('net_salary', 8, 2);
        $table->timestamps();

        $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslips');
    }
};
