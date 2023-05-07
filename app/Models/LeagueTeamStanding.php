<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $played
 * @property int $won
 * @property int $drawn
 * @property int $lost
 * @property int $goals_for
 * @property int $goals_against
 * @property int $goals_difference
 * @property int $points
 */
class LeagueTeamStanding extends Pivot
{
    use HasFactory;

    public const WON_POINT = 3;
    public const LOST_POINT = 0;
    public const DRAWN_POINT = 1;

    public const FILLABLE = [
        'team_id',
        'league_id',
        'played',
        'won',
        'drawn',
        'lost',
        'goals_for',
        'goals_against',
        'goals_difference',
        'points',
    ];

    protected $table = 'league_team';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = self::FILLABLE;

    /**
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(related:Team::class);
    }
}
