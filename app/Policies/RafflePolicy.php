<?php

namespace App\Policies;

use App\Models\Raffle;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RafflePolicy
{
    public function onlyPublished(?User $user, Raffle $raffle): bool
    {
        return ($user?->is_admin || filled($raffle->published_at));
    }

    public function drawWinner(?User $user, Raffle $raffle): bool
    {
        return !! $user?->is_admin && $raffle->applicants()->count() > 0;
    }
}
