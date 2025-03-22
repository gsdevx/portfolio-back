<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('work_cases', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        if (app()->isProduction()) {
            return;
        }

        Schema::table('work_cases', function (Blueprint $table) {
            $table->dropUnique(['slug']);
        });
    }
};
