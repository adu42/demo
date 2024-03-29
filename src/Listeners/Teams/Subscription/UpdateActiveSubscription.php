<?php

namespace Ado\Spark\Listeners\Teams\Subscription;

use Ado\Spark\Events\Teams\Subscription\SubscriptionCancelled;

class UpdateActiveSubscription
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {
        $currentPlan = $event instanceof SubscriptionCancelled
                            ? null : $event->team->subscription()->provider_plan;

        $event->team->forceFill([
            'current_billing_plan' => $currentPlan,
        ])->save();
    }
}
