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
        Schema::create('centro_custos', function (Blueprint $table) {
            $table->increments('id_centro_custo');
            $table->string('centro_custo', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        \App\Models\CentroCusto::factory()->create([
            'id_centro_custo' => 1,
            'centro_custo' => 'Alimentacao'
        ]);
        \App\Models\CentroCusto::factory()->create([
            'id_centro_custo' => 2,
            'centro_custo' => 'Transporte'
        ]);
        \App\Models\CentroCusto::factory()->create([
            'id_centro_custo' => 3,
            'centro_custo' => 'Salario'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_custos');
    }
};
