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
        Schema::table('employee_scores', function (Blueprint $table) {
            $table->foreignId('scoring_period_id')->constrained('scoring_period')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_scores', function (Blueprint $table) {
            $table->dropForeign(['scoring_period_id']);
            $table->dropColumn('scoring_period_id');
        });
    }
};
