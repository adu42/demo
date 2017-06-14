<?php

namespace Ado\Spark\Interactions;

use Ado\Spark\Contracts\Interactions\CheckPlanEligibility as Contract;

class CheckPlanEligibility implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($user, $plan)
    {
        return true;
    }
}
