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
        if (!Schema::hasColumn('wishlists', 'vendor_id')) {
            $table->foreignId('vendor_id')->nullable()->constrained('vendors')->onDelete('cascade');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('wishlists', 'vendor_id')) {
            $table->dropForeign(['vendor_id']);
            $table->dropColumn('vendor_id');
        }
    }
};