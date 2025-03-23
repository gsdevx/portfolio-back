<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('page_visits', 'visit_logs');
    }

    public function down(): void
    {
        if (app()->isProduction()) {
            return;
        }

        Schema::rename('visit_logs', 'page_visits');
    }
};
