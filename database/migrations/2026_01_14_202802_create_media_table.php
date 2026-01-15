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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('mediable_type', 32);
            $table->unsignedBigInteger('mediable_id');

            $table->string('disk')->default('public');
            $table->string('path');
            $table->string('type', 16   );
            $table->unsignedBigInteger('size')->nullable();

            $table->boolean('is_main')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(['mediable_type', 'mediable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
