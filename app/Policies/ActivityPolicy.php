<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Auth\Access\Response;

class ActivityPolicy
{

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show(User $user, Activity $activity)
    {
        return $user->id === $activity->user_id
            ? Response::allow()
            : Response::deny('You do not own this activity.');
    }
}