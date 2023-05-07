<?php

use App\Enums\LeagueEnum;
use App\Models\League;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('played_week')->default(0);
            $table->integer('total_week')->default(0);
            $table->enum('status',
                    array_map(callback: fn(LeagueEnum $enum) => $enum->value, array: LeagueEnum::cases()))
                ->default(LeagueEnum::NOT_STARTED->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leagues');
    }
};
