<?php

namespace Ado\Spark\Events;

class NotificationCreated
{
    /**
     * The notification instance.
     *
     * @var \Ado\Spark\Notification
     */
    public $notification;

    /**
     * Create a new notification instance.
     *
     * @param  \Ado\Spark\Notification  $notification
     * @return void
     */
    public function __construct($notification)
    {
        $this->notification = $notification;
    }
}
