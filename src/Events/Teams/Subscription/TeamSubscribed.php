<?php

namespace Ado\Spark\Events\Teams\Subscription;

class TeamSubscribed
{
    /**
     * The team instance.
     *
     * @var \Ado\Spark\Team
     */
    public $team;

    /**
     * The plan the team subscribed to.
     *
     * @var \Ado\Spark\Plan
     */
    public $plan;

    /**
     * Create a new event instance.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  \Ado\Spark\Plan  $plan
     * @return void
     */
    public function __construct($team, $plan)
    {
        $this->team = $team;
        $this->plan = $plan;
    }
}
