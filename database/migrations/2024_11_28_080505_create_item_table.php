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
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('itemName');
            $table->string('itemPhoto'); // url
            $table->integer('conditionPercentage');
            $table->date('purchaseDate');
            $table->integer('purchasePrice');
            $table->foreignId('categoryId')
                    ->references('categoryId')
                    ->on('category')
                    ->onDelete('cascade')
                    ->after('purchasePrice');

            $table->foreignId('locationId')
                    ->references('locationId')
                    ->on('location')
                    ->onDelete('cascade')
                    ->after('purchasePrice');
            // $item = Item::find(1);
            // $currentPrice = $item->current_price;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
