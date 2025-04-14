<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicules_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique()->nullable(false);
        });

        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 100)->nullable(false);
            $table->string('model', 100)->nullable(false);
            $table->integer('year')->nullable(false);
            $table->decimal('price_per_day', 10, 2)->nullable(false);
            $table->integer('doors')->nullable(false);
            $table->enum('fuel_type', ['essence', 'diesel', 'électrique', 'hybride'])->nullable(false);
            $table->boolean('air_conditioning')->default(false)->nullable(false);
            $table->integer('seats')->nullable(false);
            $table->enum('transmission', ['automatique', 'manuelle'])->nullable(false);
            $table->foreignId('vehicule_type_id')
                ->nullable(false)
                ->constrained('vehicules_types')
                ->cascadeOnDelete();
        });

        Schema::create('vehicules_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicule_id')->constrained('vehicules')->cascadeOnDelete()->nullable(false);
            $table->string('image_url', 255)->nullable(false);
            $table->integer('display_order')->default(0)->nullable(false);
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('vehicules_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicule_id')->constrained('vehicules')->cascadeOnDelete()->nullable(false);
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);
            $table->boolean('is_available')->default(true)->nullable(false);
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('email', 255)->nullable(false);
            $table->foreignId('vehicule_id')->constrained('vehicules')->cascadeOnDelete()->nullable(false);
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);
            $table->timestamp('created_at')->useCurrent();
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending')->nullable(false);
            $table->decimal('total_price', 10, 2)->nullable(false);
        });

        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique()->nullable(false);
        });

        Schema::create('vehicules_equipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicule_id')->nullable(false)->constrained('vehicules')->cascadeOnDelete();
            $table->foreignId('equipment_id')->nullable(false)->constrained('equipments')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicules_equipments');
        Schema::dropIfExists('equipments');
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('vehicules_availabilities');
        Schema::dropIfExists('vehicules_photos');
        Schema::dropIfExists('vehicules');
        Schema::dropIfExists('vehicules_types');
    }
};
