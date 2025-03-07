<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(false);
            $table->string('title');
            $table->integer('order')->nullable();
        });
    }

    public function down(): void
    {
        if (app()->isProduction()) {
            return;
        }

        Schema::dropIfExists('tools');
    }
};
