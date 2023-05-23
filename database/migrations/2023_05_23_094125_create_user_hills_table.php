<?php

use App\Models\Hill;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip_hills', function (Blueprint $table) {
            $table->foreignIdFor(Trip::class);
            $table->foreignIdFor(Hill::class);
            $table->foreignIdFor(User::class);

            $table->unique(['trip_id', 'hill_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_hills');
    }
};
