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
        Schema::create('diamnds', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('cut');
            $table->string('color');
            $table->string('clarity');
            $table->string('carat_weight');
            $table->string('cut_quality');
            $table->string('lab');
            $table->string('symmetry');
            $table->string('polish');
            $table->string('eye_clean');
            $table->string('culet_size');
            $table->string('culet_condition');
            $table->string('depth_percent');
            $table->string('table_percent');
            $table->string('meas_length');
            $table->string('meas_width');
            $table->string('meas_depth');
            $table->string('girdle_min');
            $table->string('girdle_max');
            $table->string('fluor_color');
            $table->string('fluor_intensity');
            $table->string('fancy_color_dominant_color');
            $table->string('fancy_color_secondary_color');
            $table->string('fancy_color_overtone');
            $table->string('fancy_color_intensity');
            $table->string('total_sales_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diamnds');
    }
};
