<?php

namespace Ado\Spark\Repositories;

use Ramsey\Uuid\Uuid;
use Ado\Spark\Announcement;
use Ado\Spark\Events\AnnouncementCreated;
use Ado\Spark\Contracts\Repositories\AnnouncementRepository as AnnouncementRepositoryContract;

class AnnouncementRepository implements AnnouncementRepositoryContract
{
    /**
     * {@inheritdoc}
     */
    public function recent()
    {
        return Announcement::with('creator')->orderBy('created_at', 'desc')->take(8)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function create($user, array $data)
    {
        $announcement = Announcement::create([
            'id' => Uuid::uuid4(),
            'user_id' => $user->id,
            'body' => $data['body'],
            'action_text' => array_get($data, 'action_text'),
            'action_url' => array_get($data, 'action_url'),
        ]);

        event(new AnnouncementCreated($announcement));

        return $announcement;
    }

    /**
     * {@inheritdoc}
     */
    public function update(Announcement $announcement, array $data)
    {
        $announcement->fill([
            'body' => $data['body'],
            'action_text' => array_get($data, 'action_text'),
            'action_url' => array_get($data, 'action_url'),
        ])->save();
    }
}
