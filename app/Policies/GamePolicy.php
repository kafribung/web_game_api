<?php

namespace App\Policies;

use App\Models\{Game, User};
use Illuminate\Auth\Access\HandlesAuthorization;

class GamePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function isOwner(User $user,  Game  $game)
    {
        return  $user->id === $game->user_id;
    }
}
