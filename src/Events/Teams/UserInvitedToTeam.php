<?php

namespace Ado\Spark\Events\Teams;

class UserInvitedToTeam
{
    /**
     * The team instance.
     *
     * @var \Ado\Spark\Team
     */
    public $team;

    /**
     * The user instance.
     *
     * @var mixed
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  mixed  $user
     * @return void
     */
    public function __construct($team, $user)
    {
        $this->team = $team;
        $this->user = $user;
    }
}
