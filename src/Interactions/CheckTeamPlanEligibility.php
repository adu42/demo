<?php

namespace Ado\Spark\Interactions;

use Ado\Spark\Contracts\Interactions\CheckTeamPlanEligibility as Contract;

class CheckTeamPlanEligibility implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($team, $plan)
    {
        return true;
    }
}
