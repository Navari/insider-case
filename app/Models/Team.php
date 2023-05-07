<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'strength'
    ];

    /**
     * @return BelongsToMany
     */
    public function leagues(): BelongsToMany
    {
        return $this
            ->belongsToMany(related: League::class)
            ->using(class: LeagueTeamStanding::class)
            ->withPivot(LeagueTeamStanding::FILLABLE);
    }

    /**
     * @return HasMany
     */
    public function standing(): HasMany
    {
        return $this->hasMany(LeagueTeamStanding::class);
    }

    /**
     * @return HasMany
     */
    public function homeMatches(): HasMany
    {
        return $this->hasMany(related: LeagueMatch::class, foreignKey:'home_team');
    }

    /**
     * @return HasMany
     */
    public function awayMatches(): HasMany
    {
        return $this->hasMany(related: LeagueMatch::class, foreignKey: 'away_team');
    }

    /**
     * @return Collection
     */
    public function getMatchesAttribute(): Collection
    {
        return $this->homeMatches->merge($this->awayMatches)->unique();
    }

    /**
     * @param int $leagueId
     * @return Collection
     */
    public function leagueMatches(int $leagueId): Collection
    {
        return $this->matches->where('league_id', $leagueId);
    }
}
