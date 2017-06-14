<?php

namespace Ado\Spark\Contracts\Interactions;

interface CheckPlanEligibility
{
    /**
     * Determine if the user is eligible to switch to the given plan.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Ado\Spark\Plan  $plan
     * @return bool
     */
    public function handle($user, $plan);
}
