    <?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotisationsSocialesTable extends Migration
{
    public function up()
    {
        Schema::create('cotisations_sociales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiche_de_paie_id')->constrained()->onDelete('cascade');
            $table->decimal('health_contribution', 8, 2)->nullable();
            $table->decimal('accident_contribution', 8, 2)->nullable();
            $table->decimal('retirement_contribution', 8, 2)->nullable();
            $table->decimal('family_contribution', 8, 2)->nullable();
            $table->decimal('unemployment_contribution', 8, 2)->nullable();
            $table->decimal('other_contributions', 8, 2)->nullable();
            $table->decimal('csg_deductible', 8, 2)->nullable();
            $table->decimal('csg_nondeductible', 8, 2)->nullable();
            $table->timestamps();
            
            $table->foreign('fiche_de_paie_id')->references('id')->on('fiche_de_paies')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('cotisations_sociales');
    }
}
