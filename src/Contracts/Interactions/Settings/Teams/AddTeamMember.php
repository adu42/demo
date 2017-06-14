<?php

namespace Ado\Spark\Contracts\Interactions\Settings\Teams;

interface AddTeamMember
{
    /**
     * Add a user to the given team.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string|null  $role
     * @return \Ado\Spark\Team
     */
    public function handle($team, $user, $role = null);
}
