<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // User Related Events...
        'Ado\Spark\Events\Auth\UserRegistered' => [
            'Ado\Spark\Listeners\Subscription\CreateTrialEndingNotification',
        ],

        'Ado\Spark\Events\Subscription\UserSubscribed' => [
            'Ado\Spark\Listeners\Subscription\UpdateActiveSubscription',
            'Ado\Spark\Listeners\Subscription\UpdateTrialEndingDate',
        ],

        'Ado\Spark\Events\Profile\ContactInformationUpdated' => [
            'Ado\Spark\Listeners\Profile\UpdateContactInformationOnBraintree',
        ],

        'Ado\Spark\Events\Subscription\SubscriptionUpdated' => [
            'Ado\Spark\Listeners\Subscription\UpdateActiveSubscription',
        ],

        'Ado\Spark\Events\Subscription\SubscriptionCancelled' => [
            'Ado\Spark\Listeners\Subscription\UpdateActiveSubscription',
        ],

        // Team Related Events...
        'Ado\Spark\Events\Teams\TeamCreated' => [
            'Ado\Spark\Listeners\Teams\Subscription\CreateTrialEndingNotification',
        ],

        'Ado\Spark\Events\Teams\Subscription\TeamSubscribed' => [
            'Ado\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',
            'Ado\Spark\Listeners\Teams\Subscription\UpdateTrialEndingDate',
        ],

        'Ado\Spark\Events\Teams\Subscription\SubscriptionUpdated' => [
            'Ado\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',
        ],

        'Ado\Spark\Events\Teams\Subscription\SubscriptionCancelled' => [
            'Ado\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',
        ],

        'Ado\Spark\Events\Teams\UserInvitedToTeam' => [
            'Ado\Spark\Listeners\Teams\CreateInvitationNotification',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
