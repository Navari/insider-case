<?php

namespace App\Models;

use App\Contracts\Constants;
use App\Enums\LeagueEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class League extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'played_week'
    ];

    protected $casts = [
        'status' => LeagueEnum::class
    ];

    /**
     * Interact with the team's logo
     *
     * @return Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucwords($value)
        );
    }

    /**
     * @return BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this
            ->belongsToMany(related: Team::class)
            ->using(class: LeagueTeamStanding::class);
    }


    /**
     * @return HasMany
     */
    public function standing(): HasMany
    {
        return $this->hasMany(LeagueTeamStanding::class)
            ->orderByDesc('points')
            ->orderByDesc('goals_for')
            ->orderBy('goals_difference', 'ASC');
    }

    /**
     * @return HasMany
     */
    public function leagueMatches(): HasMany
    {
        return $this->hasMany(related: LeagueMatch::class);
    }
}
