<?php

namespace Ado\Spark\Contracts\Interactions;

interface CheckTeamPlanEligibility
{
    /**
     * Determine if the team is eligible to switch to the given plan.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  \Ado\Spark\Plan  $plan
     * @return bool
     */
    public function handle($team, $plan);
}
