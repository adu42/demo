<?php

namespace Ado\Spark\Events\Teams;

class TeamMemberRemoved
{
    /**
     * The team instance.
     *
     * @var \Ado\Spark\Team
     */
    public $team;

    /**
     * The team member instance.
     *
     * @var mixed
     */
    public $member;

    /**
     * Create a new event instance.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  mixed  $member
     * @return void
     */
    public function __construct($team, $member)
    {
        $this->team = $team;
        $this->member = $member;
    }
}
