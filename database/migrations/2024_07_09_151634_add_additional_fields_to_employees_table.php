<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('employees', function (Blueprint $table) {
        $table->string('address')->nullable();
        $table->string('siret')->nullable();
        $table->string('ape_code')->nullable();
        $table->string('collective_agreement')->nullable();
        $table->string('social_security_payment_location')->nullable();
    });
}

public function down()
{
    Schema::table('employees', function (Blueprint $table) {
        $table->dropColumn([
            'address',
            'siret',
            'ape_code',
            'collective_agreement',
            'social_security_payment_location',
        ]);
    });
}

};
