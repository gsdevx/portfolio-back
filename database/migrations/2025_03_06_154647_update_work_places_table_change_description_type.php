<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('work_places', function (Blueprint $table) {
            $table->text('description')->change();
        });
    }

    public function down(): void
    {
        if (app()->isProduction()) {
            return;
        }

        Schema::table('work_places', function (Blueprint $table) {
            $table->string('description')->change();
        });
    }
};
