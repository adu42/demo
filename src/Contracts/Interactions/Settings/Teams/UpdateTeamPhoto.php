<?php

namespace Ado\Spark\Contracts\Interactions\Settings\Teams;

interface UpdateTeamPhoto
{
    /**
     * Get a validator instance for the given data.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    public function validator($team, array $data);

    /**
     * Update the teams's photo.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  array  $data
     * @return \Ado\Spark\Team
     */
    public function handle($team, array $data);
}
