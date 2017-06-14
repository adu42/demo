<?php

namespace Ado\Spark\Contracts\Interactions;

interface SubscribeTeam
{
    /**
     * Subscribe the team to a subscription plan.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  \Ado\Spark\Plan  $plan
     * @param  array  $data
     * @return \Ado\Spark\Team
     */
    public function handle($team, $plan, $fromRegistration, array $data);
}
