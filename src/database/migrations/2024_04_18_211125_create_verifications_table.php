<?php

use App\Enums\VerificationType;
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
        Schema::create('verifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('verifiable_type');
            $table->uuid('verifiable_id');
            $table->enum('type', [
                VerificationType::TWO_FACTOR_EMAIL,
                VerificationType::TWO_FACTOR_PHONE,
            ]);
            $table->string('code');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
