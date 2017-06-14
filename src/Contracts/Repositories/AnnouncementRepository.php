<?php

namespace Ado\Spark\Contracts\Repositories;

use Ado\Spark\Announcement;

interface AnnouncementRepository
{
    /**
     * Get the most recent announcement notifications for the application.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function recent();

    /**
     * Create an application announcement with the given data.
     *
     * @param  \Illuminate\Contracts\Authenticatable
     * @param  array  $data
     * @return \Ado\Spark\Announcement
     */
    public function create($user, array $data);

    /**
     * Update the given announcement with the given data.
     *
     * @param  \Ado\Spark\Announcement  $announcement
     * @param  array  $data
     */
    public function update(Announcement $announcement, array $data);
}
