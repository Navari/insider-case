<?php

namespace App\Enums;

use App\Contracts\Constants;

enum LeagueEnum: string
{
    case NOT_STARTED = 'NOT_STARTED';
    case STARTED = 'STARTED';
    case ENDED = 'ENDED';

    const LEAGUE_STATUS = [
        self::NOT_STARTED,
        self::STARTED,
        self::ENDED
    ];


}
