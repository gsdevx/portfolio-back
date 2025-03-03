<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(false);
            $table->string('institution_name');
            $table->string('profession');
            $table->string('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('order')->nullable();
        });
    }

    public function down(): void
    {
        if (app()->isProduction()) {
            return;
        }

        Schema::dropIfExists('education');
    }
};
