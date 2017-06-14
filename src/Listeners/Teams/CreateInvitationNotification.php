<?php

namespace Ado\Spark\Listeners\Teams;

use Ado\Spark\Spark;
use Ado\Spark\Events\Teams\UserInvitedToTeam;
use Ado\Spark\Contracts\Repositories\NotificationRepository;

class CreateInvitationNotification
{
    /**
     * The notification repository instance.
     *
     * @var NotificationRepository
     */
    protected $notifications;

    /**
     * Create a new listener instance.
     *
     * @param  NotificationRepository  $notifications
     * @return void
     */
    public function __construct(NotificationRepository $notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * Handle the event.
     *
     * @param  UserInvitedToTeam  $event
     * @return void
     */
    public function handle(UserInvitedToTeam $event)
    {
        $this->notifications->create($event->user, [
            'icon' => 'fa-users',
            'body' => 'You have been invited to join the '.$event->team->name.' '.Spark::teamString().'!',
            'action_text' => 'View Invitations',
            'action_url' => '/settings#/'.str_plural(Spark::teamString()),
        ]);
    }
}
