<?php

namespace Ado\Spark\Events\Teams\Subscription;

class SubscriptionCancelled
{
    /**
     * The team instance.
     *
     * @var \Ado\Spark\Team
     */
    public $team;

    /**
     * Create a new event instance.
     *
     * @param  \Ado\Spark\Team  $team
     * @return void
     */
    public function __construct($team)
    {
        $this->team = $team;
    }
}
