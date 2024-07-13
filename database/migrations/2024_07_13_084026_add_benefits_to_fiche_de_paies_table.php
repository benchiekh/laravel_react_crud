<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBenefitsToFicheDePaiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fiche_de_paies', function (Blueprint $table) {
            $table->decimal('benefits_food', 8, 2)->default(0);
            $table->decimal('benefits_meal_vouchers', 8, 2)->default(0);
            $table->decimal('gross_salary', 8, 2)->default(0); // Calculé
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fiche_de_paies', function (Blueprint $table) {
            $table->dropColumn('benefits_food');
            $table->dropColumn('benefits_meal_vouchers');
            $table->dropColumn('gross_salary');
        });
    }
}
