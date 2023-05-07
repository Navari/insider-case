<?php

use App\Models\League;
use App\Models\Team;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('league_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(League::class)->references('id')->on('leagues');
            $table->foreignIdFor(Team::class,'home_team')->references('id')->on('teams');
            $table->foreignIdFor(Team::class,'away_team')->references('id')->on('teams');
            $table->integer('week');
            $table->integer('home_team_goal')->default(0);
            $table->integer('away_team_goal')->default(0);
            $table->boolean('status')->default(0)->comment('0 for not played match and 1 for played');
            $table->unique(['league_id', 'home_team', 'away_team', 'week']);
            $table->timestamps();
        });

        // team can not play with hem self :D :D
        DB::statement('ALTER TABLE league_matches ADD CONSTRAINT league_matches_check_home_away_columns_cannot_equal CHECK (home_team <> away_team);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_matches');
    }
};
