<?php

namespace Ado\Spark\Contracts\Repositories;

interface NotificationRepository
{
    /**
     * Get the most recent notifications for the given user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function recent($user);

    /**
     * Create an user notification.
     *
     * @param  mixed  $user
     * @param  array  $data
     * @return \Ado\Spark\Notification
     */
    public function create($user, array $data);

    /**
     * Create a personal notification from another user.
     *
     * @param  mixed  $user
     * @param  mixed  $from
     * @param  array  $data
     * @return \Ado\Spark\Notification
     */
    public function personal($user, $from, array $data);
}
