<?php

namespace Ado\Spark\Interactions\Settings\Teams;

use Ado\Spark\Spark;
use Ado\Spark\Events\Teams\TeamMemberAdded;
use Ado\Spark\Contracts\Interactions\Settings\Teams\AddTeamMember as Contract;

class AddTeamMember implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($team, $user, $role = null)
    {
        $team->users()->attach($user, ['role' => $role ?: Spark::defaultRole()]);

        event(new TeamMemberAdded($team, $user));
    }
}
