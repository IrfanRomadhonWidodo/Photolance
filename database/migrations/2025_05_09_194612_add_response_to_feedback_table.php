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
        Schema::table('feedback', function (Blueprint $table) {
            $table->text('response')->nullable()->after('message');        // Untuk menyimpan balasan
            $table->timestamp('response_at')->nullable()->after('response'); // Untuk menyimpan waktu balasan
            $table->foreignId('response_by')->nullable()->constrained('users')->onDelete('set null')->after('response_at'); // Untuk menyimpan siapa yang membalas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropColumn(['response', 'response_at', 'response_by']);
        });
    }
};
