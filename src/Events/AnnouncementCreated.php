<?php

namespace Ado\Spark\Events;

class AnnouncementCreated
{
    /**
     * The announcement instance.
     *
     * @var \Ado\Spark\Announcement
     */
    public $announcement;

    /**
     * Create a new announcement instance.
     *
     * @param  \Ado\Spark\Announcement  $announcement
     * @return void
     */
    public function __construct($announcement)
    {
        $this->announcement = $announcement;
    }
}
