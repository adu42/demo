<?php

namespace Ado\Spark\Contracts\Interactions\Settings\Teams;

interface UpdateTeamMember
{
    /**
     * Get a validator instance for the given data.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $member
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    public function validator($team, $member, array $data);

    /**
     * Update the given team member.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $member
     * @param  array  $data
     * @return void
     */
    public function handle($team, $member, array $data);
}
