<?php

namespace Ado\Spark\Listeners\Subscription;

use Ado\Spark\Events\Subscription\SubscriptionCancelled;

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
                            ? null : $event->user->subscription()->provider_plan;

        $event->user->forceFill([
            'current_billing_plan' => $currentPlan,
        ])->save();
    }
}
