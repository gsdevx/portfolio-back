<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('work_places', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(false);
            $table->string('company_name');
            $table->string('job_title');
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

        Schema::dropIfExists('work_places');
    }
};
